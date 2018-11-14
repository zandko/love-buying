<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Focu extends Model
{
    protected $fillable = [
        'place',
        'url',
        'image',
        'alt',
        'remark',
        'sort',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /*图片路径*/
    public function getImageUrlAttribute()
    {
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }

        return \Storage::disk('admin')->url($this->attributes['image']);
    }
}
