<?php
namespace app\api\service;
//短信服务
use think\Cache;
use think\Request;
use app\api\exception\FailMsg;
class Token{

    // 生成令牌
    public static function generateToken()
    {
        $ip = $_SERVER["REMOTE_ADDR"];
        $time = time();
        return md5($ip . $time);
    }

    
    /**
     * 从缓存中获取当前用户指定身份标识
     * @param array $keys
     * @return array result
     * @throws \app\lib\exception\TokenException
     */
    public static function getCurrentIdentity($key)
    {
        $token = Request::instance()
            ->header('token');
        $vars = Cache::get($token);
        if (!$vars)
        {
            throw new FailMsg(['msg'=>'token错误或者不存在，请重新登陆','errorCode'=>'9999']);
        }
        else {
        return $vars;
        }
    }



    public static function verifyToken($token)
    {
        $exist = Cache::get($token);
        if($exist){
            return true;
        }
        else{
            return false;
        }
    }

}
