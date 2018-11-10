<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Models\CartItem;
use App\Models\ProductSku;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartItems = $request->user()->cartItems()->with(['productSku.product'])->get();
        return view('cart.index', [
            'cartItems' => $cartItems,
        ]);
    }

    public function store(AddCartRequest $addCartRequest)
    {
        $user = $addCartRequest->user();
        $skuId = $addCartRequest->input('sku_id');
        $amount = $addCartRequest->input('amount');

        if ($cart = $user->cartItems()->where('product_sku_id', $skuId)->first()) {
            $cart->update([
                'amount' => $cart->amount + $amount,
            ]);
        } else {
            $cart = new CartItem([
                'amount' => $amount,
            ]);

            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }

        return [];
    }

    public function destory(ProductSku $sku, Request $request)
    {
        $request->user()->cartItems()->where('product_sku_id', $sku->id)->delete();

        return [];
    }
}
