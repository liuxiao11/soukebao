<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Login as L;

class Login extends Controller
{
    /*登陆首页*/
    public function index()
    {
        if (request()->isPost()) {
            $login = new L();
            $admin = $login->index();
            if ($admin) {
                return $admin['admin_name'];
            }
        } else {
            return $this->fetch();
        }
    }

    /*退出*/
    public function singOut()
    {
        $A = session('admin', NULL);
        if ($A === NULL) {
            $this->success('退出成功', 'Login/index');
        } else {
            msg('退出错误！');
        }
    }

}