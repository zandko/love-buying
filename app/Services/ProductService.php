<?php

namespace App\Services;

use App\Models\Product;
use App\Services\SearchBuilders\ProductSearchBuilder;

class ProductService
{
    public function getSimilarProductIds(Product $product, $amount)
    {
        if (count($product->product_property) === 0) {
            return [];
        }

        /*查询构造器*/
        $builder = (new ProductSearchBuilder())->onSale()->paginate($amount, 1);

        /*遍历商品的属性*/
        foreach ($product->product_property as $property) {
            $builder->propertyFilter($property->name, $property->value, 'should');
        }

        /*匹配度*/
        $builder->minShouldMatch(ceil(count($product->product_property) / 2));
        $params = $builder->getParams();

        /*将当前商品的id去除*/
        $params['body']['query']['bool']['must_not'] = [
            [
                'term' => [
                    '_id' => $product->id,
                ],
            ],
        ];

        $result = app('es')->search($params);

        return collect($result['hits']['hits'])->pluck('_id')->all();
    }
}
