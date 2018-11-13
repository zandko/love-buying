<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /*白名单*/
    protected $except = [
        'payment/alipay/notify',
    ];
}
