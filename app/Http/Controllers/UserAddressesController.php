<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    /*地址列表*/
    public function index(Request $request)
    {
        return view('users.index', [
            'addresses' => $request->user()->user_address,
        ]);
    }

    /*添加地址页面*/
    public function create(UserAddress $userAddress)
    {
        return view('users.create_and_edit', [
            'addresses' => $userAddress,
        ]);
    }

    /*添加地址*/
    public function store(UserAddressRequest $userAddressRequest)
    {
        $userAddressRequest->user()->user_address()->create($userAddressRequest->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');
    }

    /*修改地址页面*/
    public function edit(UserAddress $userAddress)
    {
        $this->authorize('own',$userAddress);
        return view('users.create_and_edit', [
            'addresses' => $userAddress,
        ]);
    }

    /*修改地址*/
    public function update(UserAddressRequest $userAddressRequest, UserAddress $userAddress)
    {
        $this->authorize('own',$userAddress);
        $userAddress->update($userAddressRequest->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');
    }

    /*删除地址*/
    public function destory(UserAddress $UserAddress)
    {
        $this->authorize('own',$UserAddress);
        $UserAddress->delete();

        return [];
    }

}
