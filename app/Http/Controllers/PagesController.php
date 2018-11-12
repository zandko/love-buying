<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Product $product,CategoryService $categoryService)
    {
        $sold_count = $product->query()->orderBy('sold_count','desc')->paginate(4);
        $desc = $product->query()->orderBy('created_at','desc')->paginate(4);

        return view('pages.index',[
            'categoryTree' => $categoryService->getCategoryTree(),
            'sold_count' => $sold_count,
            'desc' => $desc,
        ]);
    }

    public function emailVerifyNotice(Request $request)
    {
        return view('pages.email_verify_notice');
    }
}
