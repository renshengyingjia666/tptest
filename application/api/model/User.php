<?php
namespace app\api\model;
use think\Model;
use app\api\service\Token;
use think\Cache;
class User extends BaseModel
{

	public static function userlogin($phonenumber,$password){
		 //手机，密码正确添加token
		 if($User=User::get(['phonenumber' => $phonenumber,'password'=>MD5('dk'.$password.'dk')])){
			 //获取user_id,token，删除旧的token	
			 $tokenold=$User->token;
			 Cache::rm($tokenold);		 	
			 $user_id=$User->user_id;
			 $Token=new Token;
			 $token=$Token->generateToken();
			 //添加新的token
			 Cache::set($token,$user_id);
		  	if(self::where('phonenumber',$phonenumber)->update(['token' =>$token])){
		  		return $token;
		  	}else{
		  		return false;
		  	}
		}else{
		 return false;
		}
	}

	//关联用户资料
    public function profile(){
           return $this->hasOne('Profile','user_id','user_id');
    }

    //查询用户信息
	public static function getUserbyID($user_id){	
	$user = self::with(['profile'])
            ->find($user_id);
	return $user;
	}


	//是否已经注册过该手机号码
	public static function issetphone($phonenumber){
		return self::where('phonenumber',$phonenumber)->find();
	}
	
	//用户注册
	public static function userregister($phonenumber,$password){
		$user = new User(['phonenumber'=>$phonenumber,'password'=>MD5('dk'.$password.'dk')]);
		$user->save();
		return $user->user_id;
	}

	//修改用户信息
	public static function editUser($user_id,$params){
		return self::where("user_id",$user_id)->update($params);  
	}

	//初始化用户基本信息
	public static function beginuser($user_id){
		$profile new profile;
		$profile->user_id=$user_id;
		$profile->save();
	}

	//修改用户密码
    public  static function editpassword($password1,$user_id){
        $user = new User;
        return  $user->save(['password'=>MD5('dk'.$password1.'dk')],['user_id',$user_id]);
    }
}
