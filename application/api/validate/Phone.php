<?php
namespace app\api\validate;
class Phone extends BaseValidate{
	protected $rule=[
		'phonenumber'=>'require|number',
	];
	protected $message=[
		'phonenumber.require'=>'phonenumber必须',
		'phonenumber.number'=>'phonenumber必须为数字',
	];


	
}