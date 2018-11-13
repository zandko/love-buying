<?php
namespace App\Http\ViewComposers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryTreeComposer
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /*无限极分类数据*/
    public function compose(View $view)
    {
        $view->with('categoryTree', $this->categoryService->getCategoryTree());
    }
}