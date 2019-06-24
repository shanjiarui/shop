<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use Request;
use think\captcha\Captcha;
use think\facade\Session;
class Login extends Controller
{
    public function login()
    {
      return $this->fetch('login');
       
    }
    public function login_action()
    {
        $code=Request::get('code');
        $name=Request::get('name');
        $password=Request::get('password');
        $captcha=new Captcha();
        if ( !$captcha->check($code)) {
        	$arr=['code'=>'1','status'=>'error','message'=>'验证码错误'];
        }else{
        	$where=['name'=>$name,'password'=>$password];
        	$res=Db::table('shop')->where($where)->find();
        	if (empty($res)) {
        		$arr=['code'=>'2','status'=>'error','message'=>"账号或者密码错误"];
        	}else{
        		$arr=['code'=>'0','status'=>'ok','message'=>"登陆成功"];
        		Session::set("name",$name);
        	}
        }
        $json=json_encode($arr);
        echo $json;
    }
    public function login_out()
    {
        Session::delete('name');
        return $this->success('退出成功','Login/login');
    }
}
