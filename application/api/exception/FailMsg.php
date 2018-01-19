<?php
namespace app\api\exception;
class FailMsg extends BaseException
{
	public $code=200;
	public $errorCode=1;
	public $msg="fail";
}