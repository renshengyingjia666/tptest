<?php
namespace app\api\exception;
class CodeException extends BaseException
{
	public $code=200;
	public $errorCode=10002;
	public $msg="验证码错误";
}