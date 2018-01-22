<?php
namespace app\api\controller;
use app\api\model\Come as ComeModel;
use app\api\exception\MissException;
class Come extends BaseController
{

	public function getcomebycome_id($come_id=null){
		$usercome=ComeModel::getcomebycome_id($come_id);
		  if (!$usercome) {
            throw new MissException([
                'msg' => '请求用户收入信息不存在',
                'errorCode' => 30000
            ]);
        }
        return $usercome;
	}
    public function getcomebyuser_id($user_id=null){
        $usercome=ComeModel::getcomebyuser_id($user_id);
          if (!$usercome) {
            throw new MissException([
                'msg' => '请求用户收入信息不存在',
                'errorCode' => 30000
            ]);
        }
        return $usercome;
    }

	



}
