<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Yansongda\Pay\Pay;
use Elasticsearch\ClientBuilder as ESClientBuilder;

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

        /*广告数据*/
        \View::composer(['pages.index','products.*'], \App\Http\ViewComposers\FocuComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*注入容器--支付*/
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
        
        /*搜索引擎*/
        $this->app->singleton('es', function () {
            $builder = ESClientBuilder::create()->setHosts(config('databases.elasticsearch.hosts'));
            if (app()->environment() == 'local') {
               $builder->setLogger(app('log')->getMonolog());
            } 
            return $builder->build();
        });
    }
}
