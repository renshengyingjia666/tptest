<?php
namespace app\api\validate;
class Login extends BaseValidate{
	protected $rule=[
		'phonenumber'=>'require|isMobile',
		'password'=>'require|alphaDash',
	];
	protected $message=[
		'password.alphaDash'=>'密码只能为字母和数字，下划线_及破折号-组成',
	];



}