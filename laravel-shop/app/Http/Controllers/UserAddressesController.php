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
        return view('user_addresses.index', [
            'addresses' => $request->user()->addresses,
        ]);
    }

    //新增收货地址
    public function create()
    {
        return view('user_addresses.create_and_edit', ['address' => new UserAddress()]);
    }

    //新增保存收货地址的方法
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

    //编辑的方法
    public function edit(UserAddress $user_address)
    {
        $this->authorize('own', $user_address);
//        dd($user_address->province);
        return view('user_addresses.create_and_edit', ['address' => $user_address]);
//        return view('user_addresses.create_and_edit', ['address' => $user_address]);
    }

    //更新操作
    public function update(UserAddress $user_address, UserAddressRequest $request)
    {
        $this->authorize('own',$user_address);
        $user_address->update($request->only([
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

    //删除收货地址
    public function destroy(UserAddress $user_address)
    {
        $this->authorize('own',$user_address);
        $user_address->delete();

        return [];  //把之前下面的重定向改为返回空数组
//        return redirect()->route('user_addresses.index');
    }
}
