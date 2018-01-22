<?php
namespace app\api\controller;
use app\api\service\Msg;
use think\Request;
use app\api\model\Code;
use app\api\exception\FailMsg;
class Phone extends BaseController
{

	public function PostMsg(){
		$Request = Request::instance();
		$phonenumber=$Request->post('phonenumber'); 
		if(Code::checkphone($phonenumber)){
			throw new FailMsg(['msg'=>'60s之内不能重复发送验证码','errorCode'='20005']);
		}
		$content=Msg::sendSms($phonenumber);
		echo json_encode($content);
	}
	

}
