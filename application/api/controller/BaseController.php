<?php
namespace app\api\controller;
use think\Controller;
use app\api\service\Token;
/**
*控制器基类 
*/
class Basecontroller extends Controller
{
	protected static function checktoken(){
	return Token::getCurrentIdentity();
	}
}