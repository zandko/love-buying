<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $fillable = ['name','value'];

    public $timestamps = false;

    /*管理商品*/
    public function product()
    {
        return $this->belongsTo(ProductProperty::class);
    }
}
