<?php
namespace app\admin\model;

use think\Db;
use think\Model;

class User extends Model
{
    public function index()
    {
        $search = $_POST;
        if ($search) {
            $where['a.user_name'] = array('like', '%' . $search['search'] . '%');
        } else {
            $where = '';
        }
        $data = findMorePgS('user', [], 'id,user_name,wx_name,wx_avaurl,phone,last_login,role', $where, '', 'a.id', 'a.id desc', 10);
        $data = isset($data) && !empty($data) ? $data : '';
        return $data;
    }

    public function info()
    {
        $data = findone('user', [], 'id,user_name,wx_name,wx_avaurl,phone,role', ['id' => input('id')]);
        return $data;
    }

    public function add()
    {
        $data = $_POST;
        $add = addData('user', $data);
        if ($add) {
            return true;
        } else {
            msgback('添加异常！');
        }

    }

    public function editUser()
    {
        $data = $_POST;
        $edit = edit('user', ['id' => input('id')], $data);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function del()
    {
        $del = del('user', ['id' => input('id')]);
        if ($del) {
            return true;
        } else {
            msgback('删除异常！');
        }
    }

    /*卖房消息审核*/
    public function agent()
    {
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findMorePg('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type', 'a.id', ['status' => 2], 'a.id desc', 10);
        if ($data) {
            $data = isset($data) && !empty($data) ? $data : '';
            return $data;
        }
    }

    public function edit()
    {
        $edit = edit('sell_house', ['id' => input('id')], ['status' => 1]);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function editOut()
    {
        $edit = edit('sell_house', ['id' => input('id')], ['status' => 0]);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }
    /*求购房消息审核*/
    public function getMsg()
    {
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findMorePg('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name', 'a.id', ['status' => 2], 'a.id desc', 10);
        if ($data) {
            $data = isset($data) && !empty($data) ? $data : '';
            return $data;
        }
    }

    public function getPass()
    {
        $edit = edit('get_house', ['id' => input('id')], ['status' => 1]);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function getOut()
    {
        $edit = edit('get_house', ['id' => input('id')], ['status' => 0]);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    /*出租房消息审核*/
    public function rentMsg()
    {
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findMorePg('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type', 'a.id', ['status' => 2], 'a.id desc', 10);
        if ($data) {
            $data = isset($data) && !empty($data) ? $data : '';
            return $data;
        }
    }

    public function rentPass()
    {
        $edit = edit('rent', ['id' => input('id')], ['status' => 1]);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function rentOut()
    {
        $edit = edit('rent', ['id' => input('id')], ['status' => 0]);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }
    /*招聘消息审核*/
    public function recruitMsg()
    {
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findMorePg('recruit', $join, 'a.id,a.name,a.phone,a.price,a.role,a.address,u.user_name,a.job,a.des', 'a.id', ['status' => 2], 'a.id desc', 10);
        if ($data) {
            $data = isset($data) && !empty($data) ? $data : '';
            return $data;
        }
    }

    public function recruitPass()
    {
        $edit = edit('recruit', ['id' => input('id')], ['status' => 1]);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }
    public function recruitOut()
    {
        $edit = edit('recruit', ['id' => input('id')], ['status' => 0]);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }
    public function category()
    {
        $type = findMore('category',[],'id,name','','','');
        return $type;
    }
}