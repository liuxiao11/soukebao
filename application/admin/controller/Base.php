<?php
namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
	public function _initialize()
	{
		if(session('admin') === NULL){
			$this->success('您还未登录！','Login/index');
		}
	}
}