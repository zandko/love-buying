<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Jobs\CloseOrder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductSku;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request, Order $order)
    {
        $orders = Order::query()
            ->with('orderItems.product','orderItems.productSku')
            ->where('user_id',$request->user()->id)
            ->orderBy('created_at','desc')
            ->paginate(5);
        return view('orders.index',[
            'orders' => $orders,
        ]);
    }

    public function detail(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        /*延迟预加载*/
        return view('orders.detail',[
            'order' => $order->load([
                'orderItems.productSku',
                'orderItems.product'
            ])
        ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $order = \DB::transaction(function () use ($user, $request) {
            $address = UserAddress::find($request->input('address_id'));

            $address->update([
                'last_used_at' => Carbon::now(),
            ]);

            $order = new Order([
                'address' => [
                    'address' => $address->full_address,
                    'zip' => $address->zip,
                    'contact_name' => $address->contact_name,
                    'contact_phone' => $address->contact_phone,
                ],
                'remark' => $request->input('remark'),
                'total_amount' => 0,
            ]);

            $order->user()->associate($user);
            $order->save();

            $totalAmount = 0;
            $items = $request->input('items');

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

            $skuIds = collect($request->input('items'))->pluck('sku_id');
            $user->cartItems()->whereIn('product_sku_id', $skuIds)->delete();

            return $order;
        });

        $this->dispatch(new CloseOrder($order,config('app.order.ttl')));

        return $order;
    }

    public function show(Request $request,Order $order)
    {
        /*延迟预加载*/
        return view('orders.show',[
            'order' => $order->load([
                'orderItems.productSku',
                'orderItems.product'
            ])
        ]);
    }

}
