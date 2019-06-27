<?php
namespace app\admin\controller;
/**
 * 
 */
use app\admin\model\Brand as BrandModel;
use Request;
use think\Db;
use gmars\rbac\Rbac;
class Brand extends Common
{
	public function initialize()
	{
		parent::initialize();
		$rbac = new Rbac;
		$action=request()->action();
		$can=$rbac->can('admin/brand/'.$action);
		$param=Request::has('html_type','param');
		if ($can===false&&$param) {
			$res=['code'=>'0','statu'=>'no','data'=>'没有权限','nihao'=>'132'];
			$js=json_encode($res);
			echo $js;
			die();
		}elseif($can===false){
			$this->redirect('admin/no_control');
		}
	}
	public function list()
	{
			return $this->fetch('brand');
				
	}
	public function add()
	{
		// $rbac = new Rbac;
		// $action=request()->action();
		// $can=$rbac->can('admin/brand/'.$action);
		// if ($can== false) {
		// 	$js=['code'=>'0','statu'=>'no','data'=>'没有操作权限'];
		// 	$js=json_encode($js);
		// 	echo $js;
		// }
			$name=Request::param('name');
			$brand=new BrandModel();
			$brand->name=$name;
			$brand->save();
	}
	public function show()
	{
		$brand=new BrandModel();
		$arr=$brand->select();
		$arr=json_decode($arr,true);
		$js=['code'=>'0','statu'=>'ok','data'=>$arr];
		$js=json_encode($js);
		echo $js;

	}
}