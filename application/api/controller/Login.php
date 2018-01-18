<?php
namespace app\api\controller;
use app\api\controller\BaseController;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\validate\Login as LoginVilidate;
use think\Request;
use app\api\model\User;
class Login extends BaseController
{

	public function Loginbypd(){
	$phonenumber=Request::instance()->post('phonenumber'); // 获取某个post变量
	$password=Request::instance()->post('password'); // 获取某个post变量	
	$validata=new LoginVilidate();
	$validata->goCheck(); 

		$userinfo=User::userlogin($phonenumber,$password);
		  if (!$userinfo) {
            throw new MissException([
                'msg' => '账号或者密码错误',
                'errorCode' => 20000
            ]);
        }else{
			throw new MissException;
		}


        return $userinfo;
	}


}

