<?php
namespace app\api\controller;
use app\api\controller\BaseController;
use app\api\model\Code as CodeModel;
use app\api\exception\SuccessMsg;
use app\api\exception\FailMsg;
use app\api\service\Code as codefunction;
class Code extends BaseController
{
	public function newcode(){
		 $codefunction= new codefunction;
		return $codefunction::showcode();
	}

	public function phonecode(){
		$phonecode=input('?post.phonecode');
		$phonenumber=input('?post.phonenumber');
		if(Code::check_phonecode($phonecode,$phonenumber)){
		throw new PhonecodeException();
		}else{
		throw new SuccessMsg();
		}
	}
}
