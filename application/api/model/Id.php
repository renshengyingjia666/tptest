<?php
/**
 * by: Chen
 * Date: 2018/1/24 002414:50
 */

namespace app\api\model;

class Id extends  BaseModel
{
  public  static  function  postIDmsg($name,$id,$imgs,$user_id){
    $Idmodel=new Id;
    $Idmodel->truename=$name;
    $Idmodel->idnumber=$id;
    $Idmodel->imgs=$imgs;
    $Idmodel->user_id=$user_id;
    return $Idmodel->save();
  }
}