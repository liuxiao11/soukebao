<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\User as U;

class User extends Controller
{
    /*用户列表*/
    public function index()
    {
        $user = new U;
        if (request()->isPost()) {
            $data = $user->index();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $data]);
            return $this->fetch();
        } else {
            $data = $user->index();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $data]);
            return $this->fetch();
        }
    }

    /*用户添加*/
    public function add()
    {
        $category = new U;
        if (request()->isPost()) {
            $category->add();
            $this->success('数据添加成功', 'User/index');
        } else {
            $user = session('admin');
            $this->assign(['admin_name' => $user]);
            return $this->fetch();
        }
    }

    /*用户修改*/
    public function edit()
    {
        $category = new U;
        if (request()->isPost()) {
            $category->editUser();
            $this->success('该条数据修改成功', 'User/index');
        } else {
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $category->info()]);
            return $this->fetch();
        }
    }

    /*用户删除*/
    public function del()
    {
        $user = new U;
        if ($user->del()) {
            $this->success('数据删除成功', 'User/index');
        };
    }

    /*卖房消息审核*/
    public function agent()
    {
        $user = new U;
        $data = $user->agent();
        $user = session('admin');
        $category = new U();
        $this->assign(['admin_name' => $user, 'list' => $data ,'category' => $category->category()]);
        return $this->fetch();
    }

    public function agentPass()
    {
        $user = new U;
        if ($user->edit()) {
            $this->success('审核成功', 'User/agent');
        }
    }

    public function agentOut()
    {
        $user = new U;
        if ($user->editOut()) {
            $this->success('拒绝成功', 'User/agent');
        }
    }

    /*求购消息审核*/
    public function getMsg()
    {
        $user = new U;
        $data = $user->getMsg();
        $user = session('admin');
        $category = new U();
        $this->assign(['admin_name' => $user, 'list' => $data ,'category' => $category->category()]);
        return $this->fetch();
    }

    public function getPass()
    {
        $user = new U;
        if ($user->getPass()) {
            $this->success('审核成功', 'User/getMsg');
        }
    }

    public function getOut()
    {
        $user = new U;
        if ($user->getOut()) {
            $this->success('拒绝成功', 'User/getMsg');
        }
    }
    /*出租*/
    public function rentMsg()
    {
        $user = new U;
        $data = $user->rentMsg();
        $user = session('admin');
        $category = new U();
        $this->assign(['admin_name' => $user, 'list' => $data ,'category' => $category->category()]);
        return $this->fetch();
    }

    public function rentPass()
    {
        $user = new U;
        if ($user->rentPass()) {
            $this->success('审核成功', 'User/rentMsg');
        }
    }
    public function rentOut()
    {
        $user = new U;
        if ($user->rentOut()) {
            $this->success('拒绝成功', 'User/rentMsg');
        }
    }

    /*招聘*/
    public function recruitMsg()
    {
        $user = new U;
        $data = $user->recruitMsg();
        $user = session('admin');
        $this->assign(['admin_name' => $user, 'list' => $data]);
        return $this->fetch();
    }

    public function recruitPass()
    {
        $user = new U;
        if ($user->recruitPass()) {
            $this->success('审核成功', 'User/recruitMsg');
        }
    }
    public function recruitOut()
    {
        $user = new U;
        if ($user->recruitOut()) {
            $this->success('拒绝成功', 'User/recruitMsg');
        }
    }
}