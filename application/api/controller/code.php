<?php
namespace app\api\controller;
use app\api\exception\SuccessMsg;
use app\api\service\Code as codefunction;
use app\api\validate\Phone;

class Code extends BaseController
{
	public function newcode(){
		 $codefunction= new codefunction;
		return $codefunction::showcode();
	}

	public function phonecode($phonecode,$phonenumber){
		$Phone=new Phone;
		$Phone->gocheck();
		if(Code::check_phonecode($phonecode,$phonenumber)){
		throw new PhonecodeException();
		}else{
		throw new SuccessMsg();
		}
	}
}
