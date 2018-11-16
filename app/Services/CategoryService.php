<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryService
{
    /*无限极分类*/
    public function getCategoryTree($parentId = null, $allCategories = null)
    {
        if (is_null($allCategories)) {
            $allCategories = Category::with(['parent', 'children'])->get();
        }

        $data = Cache::remember('categories',1440, function () use ($allCategories, $parentId) {
            return $allCategories
                ->where('parent_id', $parentId)
                ->map(function (Category $category) use ($allCategories) {
                    $data = ['id' => $category->id, 'name' => $category->name, 'order' => $category->order, 'ico' => $category->ico];

                    if (!$category->is_directory) {
                        return $data;
                    }

                    $data['children'] = $this->getCategoryTree($category->id, $allCategories);

                    return $data;
                });
        });

        return $data;
    }
}
