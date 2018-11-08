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
    $router->get('categories/{categories}/edit', 'CategoriesController@edit');
    $router->put('categories/{categories}','CategoriesController@update');
    $router->delete('categories/{categories}','CategoriesController@destroy');

    /*商品*/
    $router->get('products','ProductsController@index');
    $router->get('products/create','ProductsController@create');
    $router->post('products','ProductsController@store');
    $router->get('products/{products}/edit', 'ProductsController@edit');
    $router->put('products/{products}','ProductsController@update');
    $router->delete('products/{products}','ProductsController@destroy');

    /*优惠卷*/
    $router->get('coupon_codes','CouponCodesController@index');
    $router->get('coupon_codes/create','CouponCodesController@create');
    $router->post('coupon_codes','CouponCodesController@store');
    $router->get('coupon_codes/{coupon_codes}/edit', 'CouponCodesController@edit');
    $router->put('coupon_codes/{coupon_codes}','CouponCodesController@update');
    $router->delete('coupon_codes/{coupon_codes}','CouponCodesController@destroy');

});
