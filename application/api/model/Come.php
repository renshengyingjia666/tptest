<?php
namespace app\api\model;
use think\Db;
class Come extends BaseModel
{
	public static function getcomebycome_id($come_id){
		if($come_id){
		return Db::query('select * from  user,come where user.user_id=come.user_id and come.come_id=?',[$come_id]);
		}else{
		return Db::query('select * from  user,come where user.user_id=come.user_id');
		} 
	}

	public static function getcomebyuser_id($user_id){
		return Db::query('select * from  user,come where user.user_id=come.user_id and come.user_id=?',[$user_id]);
	}

	public function userc(){
		return $this->hasOne('user','come_id');
	}
}
