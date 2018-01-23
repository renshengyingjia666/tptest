<?php
namespace app\api\controller;
use app\api\model\Code as CodeModel;
use app\api\exception\SuccessMsg;
use app\api\exception\FailMsg;
use app\api\service\Code as codefunction;
use think\Request;
use app\api\validate\Phone;
class Code extends BaseController
{
	public function newcode(){
		 $codefunction= new codefunction;
		return $codefunction::showcode();
	}

	public function phonecode(){
		$Phone=new Phone;
		$params=$Phone->gocheck();
		if(Code::check_phonecode($params['phonecode'],$params['$phonenumber'])){
		throw new PhonecodeException();
		}else{
		throw new SuccessMsg();
		}
	}
}
