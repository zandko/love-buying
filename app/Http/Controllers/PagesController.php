<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(CategoryService $categoryService)
    {
        return view('pages.index',[
            'categoryTree' => $categoryService->getCategoryTree(),
        ]);
    }

    public function emailVerifyNotice(Request $request)
    {
        return view('pages.email_verify_notice');
    }
}
