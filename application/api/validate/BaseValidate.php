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

    
            //手机号的验证规则
    protected function isMobile($value)
    {
        $rule = '^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
}