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

});
