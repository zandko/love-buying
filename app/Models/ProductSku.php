<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    protected $fillable = [
        'title',
        'description',
        'product_id',
        'stock',
        'price',
        'image',
    ];

    /*关联商品*/
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
