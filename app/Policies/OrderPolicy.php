<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /*订单的授权策略*/
    public function own(User $user, Order $order)
    {
        return $order->user_id == $user->id;
    }

}
