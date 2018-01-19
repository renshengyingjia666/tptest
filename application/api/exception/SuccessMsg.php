<?php
namespace app\api\exception;
class SuccessMsg extends BaseException
{
	public $code=200;
	public $errorCode=0;
	public $msg="ok";
}