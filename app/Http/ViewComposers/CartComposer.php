<?php

namespace App\Http\ViewComposers;

use App\Services\CartService;
use Illuminate\View\View;

class CartComposer
{
    protected $CartService;

    public function __construct(CartService $CartService)
    {
        $this->CartService = $CartService;
    }

    /*购物车数据*/
    public function compose(View $view)
    {
        $view->with('cart', $this->CartService->get_page());
    }
}