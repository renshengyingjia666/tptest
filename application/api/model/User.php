<?php
namespace app\api\model;
use think\Model;
use app\api\service\Token;
class User extends BaseModel
{

	public static function userlogin($phonenumber,$password){
		 //手机，密码正确添加token
		 if(self::get(['phonenumber' => $phonenumber,'password'=>MD5('dk'.$password.'dk')])){
		 $Token=new Token;
		 $token=$Token->generateToken();
		 return self::where('phonenumber',$phonenumber)->update(['token' =>$token]);
		}else{
		 return false;
		}

	}

    /*public function userprofile(){
           return $this->hasOne('profile');
    }
	*/
    public static function getUserbyID($id){
		return $user->find($id);
	}


	//是否已经注册过该手机号码
	public static function issetphone($phonenumber){
		return self::where('phonenumber',$phonenumber)->find();
	}
	
	public static function userregister($phonenumber,$password){
		$user = new User(['phonenumber'=>$phonenumber,'password'=>MD5('dk'.$password.'dk')]);
		return $user->save();
	}
}
