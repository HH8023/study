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

//Route::get('/', 'PagesController@root')->name('root');
Route::redirect('/','/products')->name('root');
Route::get('products','ProductsController@index')->name('products.index');
Route::get('alipay',function () {
    return app('alipay')->web([
        'out_trade_no' => time(),
        'total_amount' => '1',
        'subject'      => 'test subject - 测试',
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/email_verify_notic', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');

    //开始
    Route::group(['middleware' => 'email_verified'], function () {
        Route::get('user_addresses','UserAddressesController@index')->name('user_addresses.index');
        Route::get('user_addresses/create','UserAddressesController@create')->name('user_addresses.create');
        Route::post('user_addresses','UserAddressesController@store')->name('user_addresses.store');
        Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');
        Route::put('user_addresses/{user_address}','UserAddressesController@update')->name('user_addresses.update');
        Route::delete('user_addresses/{user_address}','UserAddressesController@destroy')->name('user_addresses.destroy');
        Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
        Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
        Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');  //收藏商品列表
        Route::post('cart', 'CartController@add')->name('cart.add'); //添加商品到购物车
        Route::get('cart','CartController@index')->name('cart.index');//查看购物车商品
        Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');
        Route::post('orders', 'OrdersController@store')->name('orders.store');//购物车下单
        Route::get('orders', 'OrdersController@index')->name('orders.index');//用户订单列表
        Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');//用户订单详情页

        Route::get('payment/{order}/alipay','PaymentController@payByAlipay')->name('payment.alipay'); //订单的网页支付宝
        Route::get('payment/alipay/return','PaymentController@alipayReturn')->name('payment.alipay.return');  //前端回调
        Route::get('payment/{order}/wechat', 'PaymentController@payByWechat')->name('payment.wechat');//微信支付


        Route::get('backupList','BackupController@backupList')->name('backupList'); //数据库备份列表
        Route::get('dataBackup','BackupController@dataBackup')->name('dataBackup');//数据库备份

    });
});

Route::post('payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');//服务器端回调支付宝
Route::get('products/{product}', 'ProductsController@show')->name('products.show');
Route::post('payment/wechat/notify', 'PaymentController@wechatNotify')->name('payment.wechat.notify');//微信服务端回调

