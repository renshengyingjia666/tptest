<?php
/**
 * by: Chen
 * Date: 2018/1/24 002415:44
 */

namespace app\api\controller;
use app\api\exception\FailMsg;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\model\Msg AS Msgmodel;
class Msg extends BaseController
{
    /**
     * @return false|\PDOStatement|string|\think\Collection
     * @throws FailMsg
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 获取用户的信息
     */
    public  function  getMsg(){
        $user_id=parent::checktoken('user_id');
        $Msg=new Msgmodel();
        $list=$Msg->where('user_id',$user_id)->select();
        if($list){
            return $list;
        }else{
            throw new FailMsg();
        }
    }

    /**
     * @param $msg_id
     * @throws MissException
     * @throws SuccessMsg
     * 信息从未读到已读
     */
    public function  PutMsg($msg_id){
        $user_id=parent::checktoken('user_id');
        $Msg=new Msgmodel();
        if($Msg->save(['state'=>'0'],['id'=>$msg_id])){
            throw new SuccessMsg();
        }else{
            throw new MissException();
        }
    }


}