<?php

namespace App\Http\Controllers;

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
}
