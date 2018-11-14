<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Yansongda\Pay\Pay;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*分类*/
        \View::composer(['pages.index', 'products.*', 'orders.*', 'cart.*', 'email_verification.*','users.*', 'user_addresses.*'], \App\Http\ViewComposers\CategoryTreeComposer::class);

        /*最新商品数据*/
        \View::composer(['products.*'], \App\Http\ViewComposers\ProductComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*注入容器*/
        $this->app->singleton('alipay', function () {
            $config = config('pay.alipay');
//            $config['notify_url'] = route('payment.alipay.notify');
            $config['notify_url'] = 'http://requestbin.leo108.com/109rxod1';
            $config['return_url'] = route('payment.alipay.return');
            if (app()->environment() !== 'production') {
                $config['mode'] = 'dev';
                $config['log']['level'] = Logger::DEBUG;
            } else {
                $config['log']['level'] = Logger::WARNING;
            }
            return Pay::alipay($config);
        });
    }
}
