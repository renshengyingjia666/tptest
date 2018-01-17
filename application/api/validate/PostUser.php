<?php
namespace app\api\validate;
class PostUser extends BaseValidate{
	protected $rule=[
		'phonenumber'=>'require|number',
		'password'=>'require|alphaNum',
	];
	protected $msg=[
		'phonenumber.require'=>'phonenumber必须',
		'phonenumber.number'=>'phonenumber必须为数字',
		'password.require'=>'password必须',
		'password.alphaNum'=>'password只能由字母跟数组组成',
	];
}