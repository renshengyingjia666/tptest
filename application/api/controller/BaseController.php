<?php
namespace app\api\controller;
use think\Controller;
use app\api\service\Token;
/**
*控制器基类 
*/
class BaseController extends Controller
{
	protected  function checktoken($key){
	return Token::getCurrentIdentity('user_id');
	}
}