<?php

namespace App\Console\Commands\Elasticsearch;

use App\Models\Product;
use Illuminate\Console\Command;

class SyncProducts extends Command
{

    protected $signature = 'es:sync-products {--index=products}';

    protected $description = '将商品数据同步到Elasticsearch';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $es = app('es');

        Product::query()
            ->with([
                'product_sku',
                'product_property',
            ])
            ->chunkById(100, function ($products) use ($es) {
                $this->info(sprintf('正在同步ID范围为 %s 至 %s 的商品', $products->first()->id, $products->last()->id));

                $req = [
                    'body' => [],
                ];

                foreach ($products as $product) {
                    $data = $product->toESArray();

                    $req['body'][] = [
                        'index' => [
                            '_index' => $this->option('index'),
                            '_type' => '_doc',
                            '_id' => $data['id'],
                        ],
                    ];

                    $req['body'][] = $data;
                }

                try {
                    $es->bulk($req); /**批量创建 */
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            });

        $this->info('同步完成');
    }
}
