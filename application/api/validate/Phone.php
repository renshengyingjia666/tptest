<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;
class Phone extends BaseValidate{
	protected $rule=[
		'phonenumber'=>'require|isMobile',
	];


	
}