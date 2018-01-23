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
Route::post('api/login/bypd','api/Login/Loginbypd');
Route::get('api/login/phone/:phonenumber','api/Login/issetphone');
Route::post('api/register','api/Login/register');

//验证码
Route::get('api/code','api/Code/newcode');
//短信
Route::POST('api/phone/code','api/phone/PostMsg');


Route::get('api/user/info','api/user/getUser');//查询用户信息
Route::put('api/user/info','api/user/editUser');//修改用户信息
Route::put('api/profile/info','api/profile/editProfile');


//借款
Route::get('api/credit','api/Credit/getCredit');
Route::get('api/credit/detail','api/credit/getCreditdetail');