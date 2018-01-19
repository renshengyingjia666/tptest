<?php
namespace app\api\service;
//短信服务
use think\Cache;
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
    public static function getCurrentIdentity()
    {
 /*       $token = Request::instance()
            ->header('token');*/
        $issetoken = Cache::get($token);
        if (!$issetoken)
        {
            throw new TokenException();
        }
        else
        {
            return $issetoken;
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


}