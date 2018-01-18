<?php
namespace app\api\model;
use think\Model;
use think\Db;
class User extends BaseModel
{

	public static function userlogin($phonenumber,$password){
		return $user=User::get(['phonenumber' => $phonenumber,'password'=>MD5('dk'.$password.'dk')]);
	}
	
	
}
