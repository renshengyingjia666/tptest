<?php
namespace app\api\validate;
class IDmustint extends BaseValidate{
	protected $rule=[
		'id'=>'require|number',
	];
	protected $message=[
		'id.require'=>'id必须',
		'id.number'=>'id必须为数字',
	];
}