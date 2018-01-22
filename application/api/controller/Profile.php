<?php
namespace app\api\controller;
use app\api\validate\PostUser;
use app\api\model\Profile as ProfileModel;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\exception\FailMsg;
use think\Request;
class Profile extends BaseController
{

	public function editProfile(){
		$user_id=parent::checktoken('user_id');/*
		$validata=new editUser;
		$params=$validata->goCheck();*/
		$Request = Request::instance();
		$params=$Request->param();
		//防止其他字段的更新
		$del=['id','user_id'];
		foreach ($del as $k => $v) {
  			unset($params[$v]);
		}
		if(!ProfileModel::editProfile($user_id,$params)){
			throw new FailMsg([
                'msg' => '修改用户个人信息失败',
                'errorCode' => 20004
            ]);
		}else{
			throw new SuccessMsg();
			
		}

	}

}
