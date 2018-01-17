<?php
namespace app\api\exception;
use think\Exception;
/**
*自定义异常类的基类
*/
class BaseException extends Exception
{
    public $code = 400;
    public $msg = 'invalid parameters';
    public $errorCode = 999;
    public $shouldToClient = true;
    
    public function __construct($params=[])
    {
        if(!is_array($params)){
            return;
        }
        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}