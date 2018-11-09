<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    public function index(Request $request)
    {
        return view('users.index', [
            'addresses' => $request->user()->user_address,
        ]);
    }

    public function create(UserAddress $userAddress)
    {
        return view('users.create_and_edit', [
            'addresses' => $userAddress,
        ]);
    }

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

    public function edit(UserAddress $userAddress)
    {
        $this->authorize('own',$userAddress);
        return view('users.create_and_edit', [
            'addresses' => $userAddress,
        ]);
    }

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

    public function destory(UserAddress $UserAddress)
    {
        $this->authorize('own',$UserAddress);
        $UserAddress->delete();

        return [];
    }

}
