<?php
namespace app\api\validate;
use think\Validate;
use think\Request;
use app\api\exception\ParameterException;
class BaseValidate extends validate{
	function goCheck(){
		$request=Request::instance();
		$params=$request->param();
		if(!$this->check($params)){
	       $exception = new ParameterException(
                [
                    // $this->error有一个问题，并不是一定返回数组，需要判断
                    'msg' => is_array($this->error) ? implode(
                        ';', $this->error) : $this->error,
                ]);
			throw $exception;
		}
		return true;
	}
}