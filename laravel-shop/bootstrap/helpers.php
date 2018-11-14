<?php

/*
 *
存放所有自定义辅助函数 * */

//测试函数
/*function test_helper() {
    return 'OK';
}*/

/*
 * 会把当前请求的路由名称转换为css类名称，作用是允许我们针对某个页面做页面样式定制
 * */
function route_class()
{
    return str_replace('.','-',Route::currentRouteName());
}





