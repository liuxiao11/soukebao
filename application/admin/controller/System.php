<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\System as S;

class System extends Base
{
    /*设置经纪人付费金额*/
    public function index()
    {
        $user = new S;
        $data = $user->index();
        $user = session('admin');
        $this->assign(['admin_name' => $user, 'list' => $data]);
        return $this->fetch();
    }

    /*分类列表*/
    public function category()
    {
        $category = new S;
        $data = $category->category();
        $user = session('admin');
        $this->assign(['admin_name' => $user, 'list' => $data]);
        return $this->fetch();
    }

    /*分类添加*/
    public function add()
    {
        $category = new S;
        if (request()->isPost()) {
            $category->add();
            $this->success('数据添加成功', 'System/category');
        } else {
            $user = session('admin');
            $this->assign(['admin_name' => $user]);
            return $this->fetch();
        }
    }

    /*分类修改*/
    public function edit()
    {
        $category = new S;
        if (request()->isPost()) {
            $category->edit();
            $this->success('该条数据修改成功', 'System/category');
        } else {
            $user = session('admin');
            $this->assign(['admin_name' => $user, 'list' => $category->info()]);
            return $this->fetch();
        }
    }

    /*分类删除*/
    public function del()
    {
        $category = new S;
        if ($category->del()) {
            $this->success('数据删除成功', 'System/category');
        };
    }

    /*管理员信息*/
    public function editAdmin()
    {
        $user = new S;
        $data = $user->editAdmin();
//        $data['img'] = json_decode($data['lb_img'],true);
        $user = session('admin');
        $this->assign(['admin_name' => $user, 'list' => $data]);
        return $this->fetch();
    }
    /*页面信息图片*/
    public function page()
    {
        $user = new S;
        $data = $user->page();
        $data['lb_img'] = json_decode($data['lb_img'],true);
        $user = session('admin');
        $this->assign(['admin_name' => $user, 'list' => $data]);
        return $this->fetch();
    }

}