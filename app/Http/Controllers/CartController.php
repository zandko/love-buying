<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Models\ProductSku;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /*购物车列表*/
    public function index(Request $request)
    {
        $cartItems = $this->cartService->get();
        $addresses = $request->user()->user_address()->orderBy('last_used_at', 'desc')->get();
        return view('cart.index', [
            'cartItems' => $cartItems,
            'addresses' => $addresses,
        ]);
    }

    /*添加商品到购物车*/
    public function store(AddCartRequest $addCartRequest)
    {

        $skuId = $addCartRequest->input('sku_id');
        $amount = $addCartRequest->input('amount');

        $this->cartService->store($skuId, $amount);

        return [];
    }

    /*把商品从购物车移除*/
    public function destory(ProductSku $sku)
    {
        $this->cartService->destory($sku->id);

        return [];
    }
}
