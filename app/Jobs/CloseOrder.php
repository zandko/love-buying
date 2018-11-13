<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CloseOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order, $delay)
    {
        $this->order = $order;
        $this->delay($delay);
    }

    /*超时关闭订单并更新库存量*/
    public function handle()
    {
        if ($this->order->paid_at) {
            return;
        }

        \DB::transaction(function () {
            $this->order->update(['closed' => true]);
            foreach ($this->order->orderItems as $item) {
                $item->productSku->addStock($item->amount);
            }
        });
    }
}
