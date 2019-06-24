<?php
namespace app\admin\controller;
use think\Db;
class Admin extends Common
{
    public function index()
    {
    	// $arr=Db::table('shop')->select();
    	// var_dump($arr);
    	return $this->fetch("admin/admin");
    }
}
