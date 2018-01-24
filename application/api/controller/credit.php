<?php
namespace app\api\controller;
use app\api\model\Credit AS Creditmodel;
use app\api\model\Credit_record;
use app\api\exception\SuccessMsg;
use app\api\exception\MissException;
class Credit extends BaseController
{
    /**
     * @param $page
     * @param string $state
     * @param int $pagenum
     * @use 借款记录，分页，状态
     */
	public function getCredit($page,$state='',$pagenum=5){
	$user_id=parent::checktoken('user_id');
	$Credit=new Creditmodel;
	$from=($page-1)*$pagenum;
		if($state){
	$list=$Credit->where('user_id',$user_id)->where('state',$state)->limit($from,$pagenum)->order('credit_id','desc')->select();
		}else{
	$list= $Credit->where('user_id',$user_id)->limit($from,$pagenum)->order('credit_id','desc')->select();
		}
		if($list){
			throw new SuccessMsg(['msg'=>$list]);
		}else{
			throw new MissException();
		}

	}

    /**
     * @param $id
     * @use 还款记录
     */
	public function getCreditdetail($id){
	$user_id=parent::checktoken('user_id');
	$Credit_record=new Credit_record;
	$list=$Credit_record->where('credit_id',$id)->order('cr_id','desc')->select();
		if($list){
			throw new SuccessMsg(['msg'=>$list]);
		}else{
			throw new MissException();
		}
	}

}
