<?php
namespace app\admin\controller;
/**
 * 
 */
use gmars\rbac\Rbac;
class Control extends Common
{
	 public function savePermissionCategory($value='')
    {
        $rbac=new Rbac;
        $rbac->savePermissionCategory([
            'name' => '用户管理组',
            'description' => '网站用户的管理',
            'status' => 1
        ]);
    }
    public function createPermission($value='')
    {
        $rbac=new Rbac;
        $rbac->createPermission([
            'name' => '文章列表展示',
            'description' => '文章列表展示',
            'status' => 1,
            'type' => 1,
            'category_id' => 1,
            'path' => 'admin/brand/show',
        ]);
    }
    public function createRole($value='')
    {
    	//创建角色
        $rbac=new Rbac;
        $rbac->createRole([
            'name' => '管理员的管理员',
            'description' => '负责管理管理员',
            'status' => 1
        ], '1');
    }
    public function assignUserRole($value='')
    {
    	//给用户添加权限
        $rbac=new Rbac;
        $rbac->assignUserRole(1, [1]);
    }
    public function getPermissionCategory($value='')
    {
        //获取权限分组列表 Permission Category= 权限 分组
        $rbac=new Rbac;
        $r=$rbac->getPermissionCategory([['status', '=', 1]]);
        var_dump($r);
    }
    public function getPermission($value='')
    {
        //获取权限列表 Permission=权限
        $rbac=new Rbac;
        $a=$rbac->getPermission([['status', '=', 1]]);
        var_dump($a);
    }
    public function getRole($value='')
    {
    	//获取角色列表
        $rbac=new Rbac;
        $a=$rbac->getRole(['id'=>2], true);
        var_dump($a);
    }
}