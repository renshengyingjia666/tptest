<?php
namespace app\api\model;
use think\Db;
class Credit extends BaseModel
{
    public function getStateAttr($value)
        {        
        	$state = [-1=>'不通过',0=>'还款中',1=>'待审核',2=>'已还清'];
        	return $state[$value];
       }
}
