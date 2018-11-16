<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    /*首页*/
    public function index(Product $product)
    {
        $sold_count = $product->query()->orderBy('sold_count', 'desc')->paginate(8);
        $desc = $product->query()->orderBy('created_at', 'desc')->paginate(8);

        $product = Cache::remember('product_pages',60,function () use ($product) {
            return $product->all();
        });

        return view('pages.index', [
            'sold_count' => $sold_count,
            'desc' => $desc,
            'products' => $product,
        ]);
    }

    /*验证邮箱*/
    public function emailVerifyNotice(Request $request)
    {
        return view('pages.email_verify_notice');
    }
}
