<?php
namespace app\api\validate;
class Login extends BaseValidate{
	protected $rule=[
		'phonenumber'=>'require|number',
		'password'=>'require|alphaDash',
	];
	protected $msg=[
		'phonenumber.number'=>'手机号码出错',
		'password.alphaDash'=>'密码只能为字母和数字，下划线_及破折号-组成',
	];
}