<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //构造  中间件方法：当一个类对象被创建之前该方法将会被调用
    public function __construct()
    {
        $this->middleware('auth',[
            'except' => ['show','create','store']
        ]);
    }

    //新建
    public function create()
    {
        return view('users.create');
    }

    //
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    //保存
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Auth::login($user);
        session()->flash('success','欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show',[$user]);
    }

    //用户的编辑操作
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    //更新
    public function update(User $user, Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        session()->flash('success','个人资料更新成功！');

        return redirect()->route('users.show',$user);
    }
}
