<?php

namespace App\Models;

use App\Exceptions\InternalException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    /*图片路径*/
    public function getImageUrlAttribute()
    {
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }

        return \Storage::disk('public')->url($this->attributes['image']);
    }

    /*减库存*/
    public function decreaseStock($amount)
    {
        if ($amount < 0) {
            throw new InternalException('减库存不可小于0');
        }
        return $this->newQuery()->where('id', $this->id)->where('stock', '>=', $amount)->decrement('stock', $amount);
    }

    public function addStock($amount)
    {
        if ($amount < 0) {
            throw  new InternalException('加库存不可小于0');
        }
        $this->increment('stock', $amount);
    }
}
