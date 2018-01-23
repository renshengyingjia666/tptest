<?php
namespace app\api\model;
use think\Db;
class Code extends BaseModel
{	
	//检查手机验证码是否正确
	public static function check_phonecode($phonecode,$phonenumber){
		return self::where('phonecode',$phonecode)->where('phonenumber',$phonenumber)->find();
	}

	//检查是否存在手机号码
	public static function checkphoneisset($phonenumber){
		return self::where('phonenumber',$phonenumber)->find();
	}

	//code添加新的记录
	public static function add($phonenumber){
		$Code=new Code;
		$Code->phonecode=$phonenumber;
		return $Code->save();
	}

	//检查是否在60内重复发送请求
	public static function checkphone($phonenumber){
		return self::where('phonenumber',$phonenumber)->where('endtime','>',time())->find();
	}

	//更新手机验证码
	public static function recode($phonenumber,$phonecode){
		return self::(['phonecode'=>$phonecode,'endtime'=>strtotime("+1 minute")],['phonenumber'=>$phonenumber]);
	}


}
