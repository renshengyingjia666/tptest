<?php
namespace app\api\exception;
class PhonecodeException extends BaseException
{
	public $code=200;
	public $errorCode=20000;
	public $msg="手机验证码错误";
}