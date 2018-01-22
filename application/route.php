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

//注册登陆
Route::post('api/Login/bypd','api/Login/Loginbypd');
Route::get('api/Login/phone/:phonenumber','api/Login/issetphone');
Route::post('api/register','api/Login/register');

//验证码
Route::get('api/Code','api/Code/newcode');
//短信
Route::POST('api/phone/code','api/phone/PostMsg');

Route::get('api/user/info','api/user/getUser');//查询用户信息
Route::put('api/user/info','api/user/editUser');//修改用户信息
Route::put('api/profile/info','api/profile/editProfile');





Route::get('api/Come/bycomeid/:come_id','api/Come/getcomebycome_id');//获取收入通过comeid
Route::get('api/Come/byuser_id/:user_id','api/Come/getcomebyuser_id');//获取收入通过user_id