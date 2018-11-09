<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'long_title',
        'description',
        'on_sale',
        'image',
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
}