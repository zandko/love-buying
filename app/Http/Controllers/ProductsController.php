<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $bulider = Product::query()->where('on_sale', true);


        if ($order = $request->input('order', '')) {
            if (preg_match('/^(.+)_(asc|desc)$/', $order, $m)) {
                if (in_array($m[1], ['price', 'sold_count', 'rating'])) {
                    $bulider->orderBy($m[1], $m[2]);
                }
            }
        }

        $products = $bulider->paginate(15);
        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function show(Request $request, Product $product)
    {
        if (!$product->on_sale) {
            throw new InvalidRequestException('商品未上架');
        }
        return view('products.show', [
            'product' => $product,
        ]);
    }
}
