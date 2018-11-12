<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified', 'firstname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified' => 'boolean',
    ];

    /*关联地址*/
    public function user_address()
    {
        return $this->hasMany(UserAddress::class);
    }

    /*关联购物车*/
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /*关联订单*/
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    /*方法用于定义一个多对多的关联 第一个参数是关联的模型类名 第二个参数是中间表的表名*/
    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'user_favorite_products')
            ->withTimestamps()
            ->orderBy('user_favorite_products.created_at', 'desc');
    }
}
