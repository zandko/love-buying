<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'long_title',
        'description',
        'on_sale',
        'image',
        'sold_count',
        'review_count',
    ];

    protected $casts = [
        'on_sale' => 'boolean',
    ];

    /*关联分类*/
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*关联规格*/
    public function product_sku()
    {
        return $this->hasMany(ProductSku::class);
    }

    /*关联属性*/
    public function product_property()
    {
        return $this->hasMany(ProductProperty::class);
    }

    /*图片路径*/
    public function getImageUrlAttribute()
    {
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }

        return \Storage::disk('admin')->url($this->attributes['image']);
    }

    /*属性分组*/
    public function getGroupedPropertiesAttribute()
    {
        return $this->product_property
            ->groupBy('name')
            ->map(function ($properties) {
                return $properties->pluck('value')->all();
            });
    }

    /**转成数组存入搜索引擎 */
    public function toESArray()
    {
        /* 函数仅返回给定数组中指定的键/值对*/
        $arr = array_only($this->toArray(), [
            'id',
            'type',
            'title',
            'category_id',
            'long_title',
            'on_sale',
            'rating',
            'sold_count',
            'review_count',
            'price',
        ]);

        $arr['category'] = $this->category ? explode(' - ', $this->category->full_name) : '';
        $arr['category_path'] = $this->category ? $this->category->path : '';
        $arr['description'] = strip_tags($this->description);
        $arr['skus'] = $this->product_sku->map(function (ProductSku $sku) {
            return array_only($sku->toArray(), ['title', 'description', 'price']);
        });

        $arr['properties'] = $this->product_property->map(function (ProductProperty $property) {
            return array_merge(array_only($property->toArray(), ['name', 'value']), [
                'search_value' => $property->name . ':' . $property->value,
            ]);
        });

        return $arr;
    }
}
