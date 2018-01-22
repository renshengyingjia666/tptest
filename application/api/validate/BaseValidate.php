<?php
namespace app\api\validate;
use think\Validate;
use think\Request;
use app\api\exception\ParameterException;
class BaseValidate extends validate{

	//所有请求都在发生验证
	public function goCheck(){
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
		return $params; 
	}

	

	//正整数
	    protected function isPositiveInteger($value, $rule='', $data='', $field='')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return $field . '必须是正整数';
    }

    

	
}