<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Product;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request,CategoryService $categoryService)
    {
        $builder = Product::query()->where('on_sale', true);

        if ($search = $request->input('search', '')) {
            $keywords = '%'.$search.'%';
            $builder->where('title','like',$keywords)
                ->orWhere('description','like',$keywords);
        }

        if ($order = $request->input('order', '')) {
            if (preg_match('/^(.+)_(asc|desc)$/', $order, $m)) {
                if (in_array($m[1], ['price', 'sold_count', 'rating'])) {
                    $builder->orderBy($m[1], $m[2]);
                }
            }
        }

        $products = $builder->paginate(15);

        $product_desc = $builder->paginate(5);
        return view('products.index', [
            'products' => $products,
            'categoryTree' => $categoryService->getCategoryTree(),
            'product_desc' => $product_desc,
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
