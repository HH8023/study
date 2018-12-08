<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use Illuminate\Http\Request;
use App\Models\UserAddress;

class UserAddressesController extends Controller
{
    //显示收货地址列表
    public function index(Request $request)
    {
        return view('user_addresses.index',[
            'addresses' => $request->user()->addresses,
        ]);
    }

    //新增收货地址
    public function create()
    {
        return view('user_addresses.create_and_edit',['address' => new UserAddress()]);
    }

    //
    public function store(UserAddressRequest $request)
    {
        $request->user()->addresses()->create($request->only([
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
}
