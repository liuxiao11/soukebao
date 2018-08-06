<?php
namespace app\admin\model;

use think\Model;

class System extends Model
{
    public function index()
    {
        $data = $_GET;
        if ($data) {
            $find = findone('system', [], 'id,money', ['id' => 1]);
            if ($find) {
                edit('system', ['id' => $find['id']], $data);
            } else {
                addId('system', $data);
                $data = findone('system', [], 'id,money', ['id' => 1]);
            }
        } else {
            $find = findone('system', [], 'id,money', ['id' => 1]);
            if ($find) {
                $data = $find;
            } else {
                $data = '';
            }
        }
        return $data;
    }

    /*分类列表*/
    public function category()
    {
        $data = findMore('category', [], '*', '', '', '');
        if ($data) {
            return $data;
        }
    }

    public function add()
    {
        $data = $_POST;
        $add = addData('category', $data);
        if ($add) {
            return true;
        } else {
            msgback('添加异常！');
        }

    }

    public function del()
    {
        $del = del('category', ['id' => input('id')]);
        if ($del) {
            return true;
        } else {
            msgback('删除异常！');
        }
    }

    public function edit()
    {
        $data = $_POST;
        $edit = edit('category', ['id' => input('id')], $data);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function info()
    {
        $data = findone('category', [], 'name', ['id' => input('id')]);
        return $data;
    }

    public function editAdmin()
    {
        $data = $_POST;
        if ($data) {
            $find = findone('admin', [], 'id,admin_name', ['id' => $data['id']]);
            if ($find) {
                $data['admin_pwd'] = md5($data['admin_pwd']);
                edit('admin', ['id' => $find['id']], $data);
            } else {
                $data['admin_pwd'] = md5($data['admin_pwd']);
                addId('admin', $data);
                $data = findone('admin', [], 'id,admin_name', ['id' => $data['id']]);
            }
        } else {
            $find = findone('admin', [], 'id,admin_name', ['id' => 1]);
            if ($find) {
                $data = $find;
            } else {
                $data = '';
            }
        }
        return $data;
    }
}