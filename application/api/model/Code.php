<?php
namespace app\api\model;
use think\Db;
class Code extends BaseModel
{
	public static function check_phonecode($phonecode,$phonenumber){
		return self::where('phonecode',$phonecode)::where('phonenumber',$phonenumber)::find();
	}


}
