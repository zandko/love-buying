<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'amount',
        'price',
        'rating',
        'review',
        'reviewed_at',
    ];

    protected $dates = [
        'reviewed_at'
    ];

    public $timestamps = false;

    /*关联商品*/
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /*关联规格*/
    public function productSku()
    {
        return $this->belongsTo(ProductSku::class);
    }

    /*关联订单*/
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
