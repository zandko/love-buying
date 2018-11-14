<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Product;

class ProductComposer
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product->query()->where('on_sale',true)->orderBy('id','desc')->paginate(5);;
    }

    /*购物车数据*/
    public function compose(View $view)
    {
        $view->with('p_desc',$this->product);
    }
}