<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Focu;
use Illuminate\Support\Facades\Cache;


class FocuComposer
{
    protected $focu;

    public function __construct(Focu $focu)
    {
        $this->focu =  Cache::remember('focu',1440, function() use($focu) {
            return $focu->all();
        });
    }

    /*购物车数据*/
    public function compose(View $view)
    {
        $view->with('focus',$this->focu);
    }
}