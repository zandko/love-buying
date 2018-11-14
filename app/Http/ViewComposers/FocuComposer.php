<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Focu;

class FocuComposer
{
    protected $focu;

    public function __construct(Focu $focu)
    {
        $this->focu = $focu->all();
    }

    /*购物车数据*/
    public function compose(View $view)
    {
        $view->with('focus',$this->focu);
    }
}