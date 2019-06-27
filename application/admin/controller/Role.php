<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
class Role extends Common
{
    public function show()
    {
    	return $this->fetch("role_show");
    }
}
