<?php
namespace app\api\controller;
use app\api\controller\BaseController;
use app\api\validate\IDmustint;
use app\api\validate\PostUser;
use app\api\model\User as UserModel;
use app\api\validate\editUser;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\exception\FailMsg;
use think\Request;
class User extends BaseController
{

	public function getUser(){
		$user_id=parent::checktoken('user_id');
		$userinfo=UserModel::getUserbyID($user_id);
		  if (!$userinfo) {
            throw new MissException([
                'msg' => '请求用户不存在',
                'errorCode' => 20000
            ]);
        }
        return $userinfo;
	}

	public function editUser(){
		$user_id=parent::checktoken('user_id');/*
		$validata=new editUser;
		$params=$validata->goCheck();*/
		$Request = Request::instance();
		$params=$Request->param();
		//防止其他字段的更新
		$del=['while_line','credit_line','rating','password','phonenumber'];
		foreach ($del as $k => $v) {
  			unset($params[$v]);
		}
		if(!UserModel::editUser($user_id,$params)){
			throw new FailMsg([
                'msg' => '修改信息失败',
                'errorCode' => 20003
            ]);
		}else{
			throw new SuccessMsg();
			
		}

	}

/*	public function addUser($phonenumber,$password){
		$validata=new PostUser();
		$validata->goCheck();
		if(!UserModel::addUser($phonenumber,$password)){
			return new FailMsg();
		}else{
			return new SuccessMsg();
		}
	}

	public function updateuser($id,$sex=null,$nickname=null){
		(new IDmustint())->goCheck();
		 if(!UserModel::updateuser($id,$sex,$nickname)){
		 	return new FailMsg();
		 }else{
		 	return new SuccessMsg();
		}
	}	*/
	

}
