<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    /*商品分类*/
    $router->get('categories','CategoriesController@index');
    $router->get('categories/create','CategoriesController@create');
    $router->post('categories','CategoriesController@store');
    $router->get('categories/{category}/edit', 'CategoriesController@edit');
    $router->put('categories/{category}','CategoriesController@update');
    $router->delete('categories/{category}','CategoriesController@destroy');

    /*商品*/
    $router->get('products','ProductsController@index');
    $router->get('products/create','ProductsController@create');
    $router->post('products','ProductsController@store');
    $router->get('products/{product}/edit', 'ProductsController@edit');
    $router->put('products/{product}','ProductsController@update');
    $router->delete('products/{product}','ProductsController@destroy');


    /*优惠卷*/
    $router->get('coupon_codes','CouponCodesController@index');
    $router->get('coupon_codes/create','CouponCodesController@create');
    $router->post('coupon_codes','CouponCodesController@store');
    $router->get('coupon_codes/{coupon_code}/edit', 'CouponCodesController@edit');
    $router->put('coupon_codes/{coupon_code}','CouponCodesController@update');
    $router->delete('coupon_codes/{coupon_code}','CouponCodesController@destroy');

    /*用户*/
    $router->get('users','UsersController@index');

    /*订单*/
    $router->get('orders','OrdersController@index')->name('admin.orders.index');
    $router->get('orders/{order}', 'OrdersController@show')->name('admin.orders.show');
    $router->post('orders/{order}/ship', 'OrdersController@ship')->name('admin.orders.ship');

});
