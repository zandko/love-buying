<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->where('on_sale',true)->paginate();
        return view('products.index',[
            'products' => $products,
        ]);
    }

    public function show(Request $request, Product $product)
    {
        if(!$product->on_sale)
        {
            throw new InvalidRequestException('商品未上架');
        }
        return view('products.show',[
            'product' => $product,
        ]);
    }
}
