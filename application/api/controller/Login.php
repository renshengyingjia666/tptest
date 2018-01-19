<?php
namespace app\api\controller;
use app\api\controller\BaseController;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\validate\Login as LoginVilidate;
use app\api\exception\failMsg;
use think\Request;
use app\api\model\User;
use app\api\service\code;
class Login extends BaseController
{

	//检查手机是否已被注册
	public function issetphone(){
		if(!User::issetphone($phonenumber)){
		throw new failMsg(['该手机已被注册','errorCode'=>20001]);
		}else{
		throw new SuccessMsg;
		}
	}

	//通过手机，密码登陆
	public function Loginbypd(){
	$validata=new LoginVilidate();
	$phonenumber=Request::instance()->post('phonenumber');
	$password=Request::instance()->post('password');	
	$validata->goCheck(); 
		$userinfo=User::userlogin($phonenumber,$password);
		  if (!$userinfo) {
            throw new MissException([
                'msg' => '账号或者密码错误',
                'errorCode' => 20002
            ]);
        }else{
			throw new SuccessMsg;
		}
	}

	//注册账号
	public function register(){
		$code=new code();
		$code::checkcode();
		$validata=new LoginVilidate();
		$validata->goCheck(); 
		$phonenumber=Request::instance()->post('phonenumber');
		if(!User::issetphone($phonenumber)){
		throw new failMsg(['该手机已被注册','errorCode'=>20001]);
		}
		$password=Request::instance()->post('password');
		$userinfo=User::userregister($phonenumber,$password);	
	}

	/*	//通过手机号码登陆
	public function Loginbyph(){

	}*/
}

