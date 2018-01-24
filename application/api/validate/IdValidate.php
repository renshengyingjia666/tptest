<?php
/**
 * by: Chen
 * Date: 2018/1/24 002411:45
 */

namespace app\api\validate;


class IdValidate extends BaseValidate
{
    protected $rule=[
        'id'=>'require|number|isID',
        'name'=>'require|max:6',
    ];
    protected $message=[
        'name'=>'姓名格式不正确',
    ];

}