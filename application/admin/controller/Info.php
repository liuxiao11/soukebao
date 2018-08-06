<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Info as I;

class Info extends Controller
{
    /*卖房信息*/
    public function index()
    {
        $user = new I;
        if (request()->isPost()) {
            $data = $user->index();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $data]);
            return $this->fetch();
        } else {
            $data = $user->index();
            $user = session('admin');
            $c = new I;
            $this->assign(['admin_name' => $user, 'list' => $data ,'category' => $c->category()]);
            return $this->fetch();
        }
    }

    /*求购信息*/
    public function infoGet()
    {
        $user = new I;
        if (request()->isPost()) {
            $data = $user->infoGet();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $data]);
            return $this->fetch();
        } else {
            $data = $user->infoGet();
            $user = session('admin');
            $c = new I;
            $this->assign(['admin_name' => $user, 'list' => $data ,'category' => $c->category()]);
            return $this->fetch();
        }
    }

    /*租房信息*/
    public function infoRent()
    {
        $user = new I;
        if (request()->isPost()) {
            $data = $user->infoRent();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $data]);
            return $this->fetch();
        } else {
            $data = $user->infoRent();
            $user = session('admin');
            $c = new I;
            $this->assign(['admin_name' => $user, 'list' => $data ,'category' => $c->category()]);
            return $this->fetch();
        }
    }

    /*招聘信息*/
    public function infoRecruit()
    {
        $user = new I;
        if (request()->isPost()) {
            $data = $user->infoRecruit();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $data]);
            return $this->fetch();
        } else {
            $data = $user->infoRecruit();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $data]);
            return $this->fetch();
        }
    }
    /*城市三级联动*/
    //读取省
    public function province()
    {
        $user = new I;
        $list = $user->province();
        return $list;
    }

    //读取市
    public function city()
    {
        $user = new I;
        if (request()->isPost()) {
            $list = $user->city();
        } else {
            $list = "";
        }
        return $list;
    }

    //读取区
    public function area()
    {
        $user = new I;
        if (request()->isPost()) {
            $list = $user->area();
        } else {
            $list = "";
        }
        return $list;
    }

    /*卖房信息添加*/
    public function add()
    {
        $category = new I;
        if (request()->isPost()) {
            $category->add();
            $this->success('数据添加成功', 'User/agent');
        } else {
            $user_name = $category->user();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'data' => $user_name, 'province' => $this->province() ,'category' => $category->category()]);
            return $this->fetch();
        }
    }

    /*卖房信息修改*/
    public function edit()
    {
        $category = new I;
        if (request()->isPost()) {
            $category->edit();
            $this->success('该条数据修改成功', 'Info/index');
        } else {
            $user_name = $category->user();
            $list = $category->info();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'data' => $user_name, 'province' => $this->province(), 'list' => $list ,'category' => $category->category()]);
            return $this->fetch();
        }
    }

    /*求购信息添加*/
    public function addGet()
    {
        $category = new I;
        if (request()->isPost()) {
            $category->addGet();
            $this->success('数据添加成功', 'Info/infoGet');
        } else {
            $user_name = $category->user();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'data' => $user_name]);
            return $this->fetch();
        }
    }

    /*求购信息修改*/
    public function editGet()
    {
        $category = new I;
        if (request()->isPost()) {
            $category->editGet();
            $this->success('该条数据修改成功', 'Info/infoGet');
        } else {
            $user_name = $category->user();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'data' => $user_name]);
            return $this->fetch();
        }
    }

    /*租房消息添加*/
    public function addRent()
    {
        $category = new I;
        if (request()->isPost()) {
            $category->addRent();
            $this->success('数据添加成功', 'Info/infoRent');
        } else {
            $user_name = $category->user();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'data' => $user_name]);
            return $this->fetch();
        }
    }

    /*租房消息修改*/
    public function editRent()
    {
        $category = new I;
        if (request()->isPost()) {
            $category->editRent();
            $this->success('该条数据修改成功', 'Info/infoRent');
        } else {
            $user_name = $category->user();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'data' => $user_name]);
            return $this->fetch();
        }
    }

    /*招聘消息添加*/
    public function addRecruit()
    {
        $category = new I;
        if (request()->isPost()) {
            $category->addRecruit();
            $this->success('数据添加成功', 'Info/infoRecruit');
        } else {
            $user_name = $category->user();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'data' => $user_name]);
            return $this->fetch();
        }
    }

    /*招聘消息修改*/
    public function editRecruit()
    {
        $category = new I;
        if (request()->isPost()) {
            $category->editRecruit();
            $this->success('该条数据修改成功', 'Info/infoRecruit');
        } else {
            $user_name = $category->user();
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'data' => $user_name]);
            return $this->fetch();
        }
    }

    /*卖房信息删除*/
    public function del()
    {
        $user = new I;
        if ($user->del()) {
            $this->success('数据删除成功', 'Info/index');
        };
    }

    /*租房消息删除*/
    public function delRent()
    {
        $user = new I;
        if ($user->delRent()) {
            $this->success('数据删除成功', 'Info/infoRent');
        };
    }

    /*招聘消息删除*/
    public function delRecruit()
    {
        $user = new I;
        if ($user->delRecruit()) {
            $this->success('数据删除成功', 'Info/infoRecruit');
        };
    }

    /*求购消息删除*/
    public function delGet()
    {
        $user = new I;
        if ($user->delGet()) {
            $this->success('数据删除成功', 'Info/infoGet');
        };
    }
}