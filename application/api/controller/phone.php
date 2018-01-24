<?php
namespace app\api\controller;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\service\Msg;
use think\Request;
use app\api\model\Code;
use app\api\exception\FailMsg;
use app\api\model\User;
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

    /**
     * @param $phonecode
     * @param $password1
     * @param $password2
     * @throws FailMsg
     * @throws MissException
     * @throws SuccessMsg
     * 修改密码
     */
	public  function  editpassword($phonecode,$password1,$password2){
	    if($password1==$password2){
            if(self::check_phonecode($phonecode,$password1)){
                $user_id=parent::checktoken('user_id');
                $use=new User;
                if($use::editpassword($password1,$user_id)){
                    throw  new SuccessMsg();
                }
            }else{        throw new MissException([
                'msg' => '验证码错误',
                'errorCode' => 20000
                ]);
            }
        }else{
	        throw new FailMsg(['msg'=>'两次密码不一样']);
        }
    }

}
