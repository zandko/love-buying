<?php

namespace App\Services;

use App\Exceptions\InvalidRequestException;
use App\Jobs\CloseOrder;
use App\Models\ProductSku;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use App\Models\Order;

class OrderService
{
    public function store(User $user, UserAddress $userAddress, $remark, $items)
    {
        $order = \DB::transaction(function () use ($user, $userAddress, $remark, $items) {
            $userAddress->update([
                'last_used_at' => Carbon::now(),
            ]);

            $order = new Order([
                'address' => [
                    'address' => $userAddress->full_address,
                    'zip' => $userAddress->zip,
                    'contact_name' => $userAddress->contact_name,
                    'contact_phone' => $userAddress->contact_phone,
                ],

                'remark' => $remark,
                'total_amount' => 0,
            ]);

            $order->user()->associate($user);
            $order->save();

            $totalAmount = 0;

            foreach ($items as $data) {

                $sku = ProductSku::find($data['sku_id']);
                $item = $order->orderItems()->make([
                    'amount' => $data['amount'],
                    'price' => $sku->price,
                ]);

                $item->product()->associate($sku->product_id);
                $item->productSku()->associate($sku);
                $item->save();

                $totalAmount += $sku->price * $data['amount'];

                if ($sku->decreaseStock($data['amount']) <= 0) {
                    throw new InvalidRequestException('该商品库存不足');
                }
            }

            $order->update([
                'total_amount' => $totalAmount,
            ]);

            $skuIds = collect($items)->pluck('sku_id')->all();
            app(CartService::class)->destory($skuIds);

            return $order;
        });

        dispatch(new CloseOrder($order, config('app.order_ttl')));

        return $order;
    }
}