<?php

namespace App\Services;

use App\Models\Category;

class  CategoryService
{
    /*无限极分类*/
    public function getCategoryTree($parentId = null, $allCategories = null)
    {
        if (is_null($allCategories)) {
            $allCategories = Category::all();
        }

        return $allCategories
            ->where('parent_id', $parentId)
            ->map(function (Category $category) use ($allCategories) {
                $data = ['id' => $category->id, 'name' => $category->name];

                if (!$category->is_directory) {
                    return $data;
                }

                $data['children'] = $this->getCategoryTree($category->id, $allCategories);

                return $data;
            });
    }
}