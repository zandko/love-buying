<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use App\Models\OrderItem;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProductSoldCount implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  OrderPaid $event
     * @return void
     */
    public function handle(OrderPaid $event)
    {
        $order = $event->getOrder();
        $order->load('orderItems.product');
        foreach ($order->orderItems as $item) {
            $product = $item->product;
            $soldCount = OrderItem::query()
                ->where('product_id', $product->id)
                ->whereHas('order', function ($query) {
                    $query->whereNotNull('paid_at');
                })->sum('amount');
            $product->update([
                'sold_count' => $soldCount,
            ]);
        }
    }
}
