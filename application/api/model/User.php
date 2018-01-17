<?php
namespace app\api\model;
use think\Model;
use think\Db;
class User extends BaseModel
{
	public static function getUserbyID($id){
		return $user=user::get(1);
	} 
	public static function addUser($phonenumber,$password){
		return Db::execute('insert into user (phonenumber,password) values (:phonenumber,:password)',['phonenumber'=>$phonenumber,'password'=>md5($password)]);
	}
	public static function updateuser($id,$sex,$nickname){
		$user = User::get($id);
		if($sex){
			$user->sex=$sex;
		}
		if($nickname){
			$user->nickname=$nickname;
		}
		return $user->save();
	}
	public function getSexAttr($value,$data){
		$sex=['0'=>'女','1'=>'男','2'=>'未知'];
		return $sex[$data['sex']];
	}

}
