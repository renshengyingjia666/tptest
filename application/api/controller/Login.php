<?php
namespace app\api\controller;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\validate\Login as LoginVilidate;
use app\api\validate\Phone;
use app\api\exception\FailMsg;
use think\Request;
use app\api\model\User;
use app\api\service\code;
use think\Cache;
class Login extends BaseController
{

	//检查手机是否已被注册
	public function issetphone($phonenumber){
		$validata=new Phone;
		$validata->goCheck();
		if(User::issetphone($phonenumber)){
		throw new FailMsg(['msg'=>'该手机已被注册','errorCode'=>20001]);
		}else{
		throw new SuccessMsg;
		}
	}

	//通过手机，密码登陆,返回token
	public function Loginbypd($phonenumber,$password){
	$validata=new LoginVilidate();
	$validata->goCheck();
	$token=User::userlogin($phonenumber,$password);
		 if (!$token) {
            throw new MissException([
                'msg' => '账号或者密码错误',
                'errorCode' => 20002
            ]);
        }else{
			return ['token'=>$token];
		}
	}

	//注册账号
	public function register(){
		$code=new code();
		$code::checkcode();
		$validata=new LoginVilidate();
		$validata->goCheck();
        $params=$validata->param();
		if(!User::issetphone($phonenumber)){
		throw new failMsg(['该手机已被注册','errorCode'=>20001]);
		}
		$user_id=User::userregister($params['phonenumber'],$params['password']);	
	}

	/*	//通过手机号码登陆
	public function Loginbyph(){

	}*/
}

