<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserAddressPolicy
{
    use HandlesAuthorization;

    /*地址的授权策略*/
    public function own(User $user, UserAddress $userAddress)
    {
        return $userAddress->user_id == $user->id;
    }
}
