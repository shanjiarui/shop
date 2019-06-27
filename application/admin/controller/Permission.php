<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use gmars\rbac\Rbac;
use Request;
class Permission extends Common
{
    public function show()
    {
    	$arr=Db::query('select * from permission_category');
    	$this->assign('arr',$arr);
    	return $this->fetch("Permission_show");
    }

    public function createPermission()
    {
    	$name=Request::post('name');
    	$category=Request::post('category');
    	$path=Request::post('path');
        $rbac=new Rbac;
        $rbac->createPermission([
            'name' => $name,
            'description' => '测试ADD',
            'status' => 1,
            'type' => 1,
            'category_id' => $category,
            'path' => $path,
        ]);
    }
    public function permission_list()
    {
    	$arr=Db::query('select p.id,p.name as p_name,pc.name,p.path from permission as p join permission_category as pc on p.category_id=pc.id');
    	$js=['code'=>'0','statu'=>'ok','data'=>$arr];
    	$json=json_encode($js);
    	echo $json;
    }
    public function update_permission()
    {
    	$id=Request::post('id');
    	$arr=Db::query("select * from permission where id=$id");
    	$category=Db::query("select * from permission_category");
    	$js=['code'=>'0','statu'=>'ok','data'=>$arr,'category'=>$category];
    	$json=json_encode($js);
    	echo $json;
    }
    public function update_permission_action()
    {
    	$id=Request::post('id');
    	$permission=Request::post('permission');
    	$path=Request::post('path');
    	$category_id=Request::post('category_id');
    	$arr=Db::query("update permission set name='$permission',path='$path',category_id=$category_id where id=$id");
    	echo "ok";
    }
    public function del_permission()
    {
    	$id=Request::post('id');
    	$arr=Db::query("delete from permission where id=$id");
    	echo "ok";
    }
}
