<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Redis;

/*Route::get('/', function () {
    return view('welcome');
});*/


/*Route::get('/', function () {
//    Redis::set('name','wandx');//使用服务端的redis打开去存入
//    return Redis::get('name');//读取redis的数据

    Cache::put('age','12',11);   //第三个参数是存活时间（单位是秒）
    return Cache::get('age');

});*/


    Route::get('/',function () {
        $data = [
            'event' =>'aNewMessage',
            'data' => [
                'name' => 'wandxx'
            ]
        ];
        //1、redis先开启一个频道publish的第一个参数就是频道
        Redis::publish('test-channel',json_encode($data));//publish有一个订阅的方法
//        return 'Done1';
        return  view('welcome');
    });



