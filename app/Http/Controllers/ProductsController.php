<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request, CategoryService $categoryService)
    {
        $builder = Product::query()->where('on_sale', true);
        $product_desc = $builder->orderBy('id','desc')->paginate(5);

        if ($search = $request->input('search', '')) {
            $keywords = '%' . $search . '%';
            $builder->where('title', 'like', $keywords)
                ->orWhere('description', 'like', $keywords);
        }

        if ($order = $request->input('order', '')) {
            if (preg_match('/^(.+)_(asc|desc)$/', $order, $m)) {
                if (in_array($m[1], ['price', 'sold_count', 'rating'])) {
                    $builder->orderBy($m[1], $m[2]);
                }
            }
        }

        $products = $builder->paginate(15);

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

        $favored = false;

        if ($user = $request->user()) {
            $favored = $favor = boolval($user->favoriteProducts()->find($product->id));
        }

        $reviews = OrderItem::query()
            ->with('order.user', 'productSku')
            ->where('product_id', $product->id)
            ->whereNotNull('reviewed_at')
            ->orderBy('reviewed_at', 'desc')
            ->paginate(10);

        return view('products.show', [
            'product' => $product,
            'favored' => $favored,
            'reviews' => $reviews,
        ]);
    }

    public function favorites(Request $request)
    {
        $products = $request->user()->favoriteProducts()->paginate(10);
        return view('products.favorites', [
            'products' => $products,
        ]);
    }

    public function favor(Product $product, Request $request)
    {
        $user = $request->user();
        if ($user->favoriteProducts()->find($product->id)) {
            return [];
        }

        /*attach() 方法将当前用户和此商品关联起来*/
        $user->favoriteProducts()->attach($product);

        return [];
    }

    public function disfavor(Product $product, Request $request)
    {
        $user = $request->user();
        /*detach() 方法用于取消多对多的关联*/
        $user->favoriteProducts()->detach($product);
        return [];
    }
}
