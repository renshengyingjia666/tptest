<?php
/**
 * by: Chen
 * Date: 2018/1/24 11:25
 */
namespace app\api\controller;
use app\api\exception\FailMsg;
use app\api\exception\MissException;
use app\api\exception\SuccessMsg;
use app\api\validate\IdValidate;
use app\api\model\Id as IdModel;
class Id extends BaseController
{
    /**
     * @param $name
     * @param $id
     * @throws SuccessMsg
     * @throws \app\api\exception\ParameterException
     * 检查 名字 身份证是否符合规则
     */
    public  function  checknameid($name,$id){
        parent::checktoken('user_id');
        $IdValidate=new IdValidate();
        $IdValidate->goCheck();
        throw new  SuccessMsg();
    }

    /**
     * @param $name
     * @param $id
     * @param $imgs
     * @throws MissException
     * @throws SuccessMsg
     * @throws \app\api\exception\ParameterException
     * 上传用户实名认证
     */
    public  function postIDmsg($name,$id,$imgs){
        $IdValidate=new IdValidate();
        $IdValidate->goCheck();
        $user_id=parent::checktoken('user_id');
        $Id=new IdModel();
        if($Id::postIDmsg($name,$id,$imgs,$user_id)){
            throw new SuccessMsg();
        }else{
            throw new FailMsg();
        }
    }
}