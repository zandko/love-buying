<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductComposer
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = Cache::remember('product',60,function () use ($product) {
            return $product->query()->where('on_sale', true)->orderBy('id', 'desc')->paginate(5);
        });


    }

    /*购物车数据*/
    public function compose(View $view)
    {
        $view->with('p_desc', $this->product);
    }
}