<?php
namespace app\api\model;
use think\Db;
class Profile extends BaseModel
{

	public static function editProfile($user_id,$params){
		return self::where("user_id",$user_id)->update($params);  
	}
}
