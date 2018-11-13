<?php

namespace App\Services;

use Auth;
use App\Models\CartItem;

class CartService
{
    /*常规查询*/
    public function get()
    {
        return Auth::user()->cartItems()->with([
            'productSku.product'
        ])->get();
    }

    public function get_page()
    {
        if(Auth::user()) {
            return Auth::user()->cartItems()->with([
                'productSku.product'
            ])->paginate(3);
        }else {
            return [];
        }
    }

    /*添加商品到购物车*/
    public function store($skuId, $amount)
    {
        $user = Auth::user();

        if ($item = $user->cartItems()->where('product_sku_id', $skuId)->first()) {
            $item->update([
                'amount' => $item->amount + $amount,
            ]);
        } else {
            $item = new CartItem([
                'amount' => $amount
            ]);
            $item->user()->associate($user);
            $item->productSku()->associate($skuId);
            $item->save();
        }

        return $item;
    }

    /*把商品移除购物车*/
    public function destory($skuIds)
    {
        if (!is_array($skuIds)) {
            $skuIds = [$skuIds];
        }

        Auth::user()->cartItems()->whereIn('product_sku_id', $skuIds)->delete();
    }
}