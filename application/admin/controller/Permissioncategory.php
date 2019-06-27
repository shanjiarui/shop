<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
class Permissioncategory extends Common
{
    public function show()
    {
    	return $this->fetch("Permission_category");
    }
}
