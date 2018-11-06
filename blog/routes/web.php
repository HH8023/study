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




Route::get('/', function () {
//    Redis::set('name','wandx');//使用服务端的redis打开去存入
//    return Redis::get('name');//读取redis的数据

    Cache::put('age','12',11);   //第三个参数是存活时间（单位是秒）
    return Cache::get('age');

});
