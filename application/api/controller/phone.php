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
		if(!Code::checkphoneisset($phonenumber)){
			Code::add($phonenumber);
		}else{
			//是否在60s之内重复发送验证码
			if(Code::checkphone($phonenumber)){
				throw new FailMsg(['msg'=>'60s之内不能重复发送验证码','errorCode'=>'20005']);
			}	
		}
		$content=Msg::sendSms($phonenumber);
		echo json_encode($content);
		//记录手机验证码跟时间
		Code::recode($phonenumber,$phonecode);
	}
	

}
