<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//定义根目录路由
Route::get('/',function(){
	return 'Hellow,world!';
});

Route::post('api/Login','api/Login/Loginbypd');

Route::get('api/user/:id','api/user/getUser');//查询用户信息
Route::post('api/user','api/user/addUser');//新增
Route::put('api/user/:id','api/user/updateuser');//修改


Route::get('api/Come/bycomeid/:come_id','api/Come/getcomebycome_id');//获取收入通过comeid
Route::get('api/Come/byuser_id/:user_id','api/Come/getcomebyuser_id');//获取收入通过user_id