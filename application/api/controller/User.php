<?php
namespace app\api\controller;
use app\api\controller\BaseController;
use app\api\validate\IDmustint;
use app\api\validate\PostUser;
use app\api\model\User as UserModel;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\exception\FailMsg;
use app\api\model\Come;
class User extends BaseController
{

	public function getUser(){
		$id=self::checktoken();
		$userinfo=UserModel::getUserbyID($id);
		  if (!$userinfo) {
            throw new MissException([
                'msg' => '请求用户不存在',
                'errorCode' => 20000
            ]);
        }
        return $userinfo;
	}

	public function addUser($phonenumber,$password){
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
	}	
	

}
