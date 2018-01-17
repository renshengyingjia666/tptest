<?php
namespace app\api\validate;
class IDmustint extends BaseValidate{
	protected $rule=[
		'id'=>'require|number',
	];
	protected $msg=[
		'id.require'=>'id必须',
		'id.number'=>'id必须为数字',
	];
}