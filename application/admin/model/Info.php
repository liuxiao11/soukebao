<?php
namespace app\admin\model;

use think\Db;
use think\Model;

class Info extends Model
{
    public function index()
    {
        $search = $_POST;
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        if ($search) {
            $where['a.name'] = array('like', '%' . $search['search'] . '%');
            $where['a.phone'] = array('like', '%' . $search['search'] . '%');
            $where['a.price'] = array('like', '%' . $search['search'] . '%');
            $where['a.district'] = array('like', '%' . $search['search'] . '%');
        } else {
            $where = '';
        }
        $data = findMorePgS('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type', $where, ['status' => 1], 'a.id', 'a.id desc', 10);
        $data = isset($data) && !empty($data) ? $data : '';
        return $data;
    }

    public function infoGet()
    {
        $search = $_POST;
        if ($search) {
            $where['a.area'] = array('like', '%' . $search['search'] . '%');
            $where['a.phone'] = array('like', '%' . $search['search'] . '%');
            $where['a.price'] = array('like', '%' . $search['search'] . '%');
            $where['a.district'] = array('like', '%' . $search['search'] . '%');
        } else {
            $where = '';
        }
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findMorePgS('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name', $where, ['status' => 1], 'a.id', 'a.id desc', 10);
        $data = isset($data) && !empty($data) ? $data : '';
        return $data;
    }

    public function infoRent()
    {
        $search = $_POST;
        if ($search) {
            $where['a.name'] = array('like', '%' . $search['search'] . '%');
            $where['a.phone'] = array('like', '%' . $search['search'] . '%');
            $where['a.price'] = array('like', '%' . $search['search'] . '%');
            $where['a.district'] = array('like', '%' . $search['search'] . '%');
        } else {
            $where = '';
        }
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findMorePgS('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type', $where, ['status' => 1], 'a.id', 'a.id desc', 10);
        $data = isset($data) && !empty($data) ? $data : '';
        return $data;
    }

    public function infoRecruit()
    {
        $search = $_POST;
        if ($search) {
            $where['a.name'] = array('like', '%' . $search['search'] . '%');
            $where['a.phone'] = array('like', '%' . $search['search'] . '%');
            $where['a.price'] = array('like', '%' . $search['search'] . '%');
            $where['a.address'] = array('like', '%' . $search['search'] . '%');
        } else {
            $where = '';
        }
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findMorePgS('recruit', $join, 'a.id,a.name,a.phone,a.job,a.price,a.role,a.address,u.user_name', $where, ['status' => 1], 'a.id', 'a.id desc', 10);
        $data = isset($data) && !empty($data) ? $data : '';
        return $data;
    }

    public function user()
    {
        $data = findMore('user', [], 'id,user_name', '', '', '');
        return $data;
    }

    public function province()
    {
        $data = findMore('province', [], 'code,name', '', '', '');
        return $data;
    }

    public function city()
    {
        $provinceid = $_POST;
        if ($provinceid) {
            $where = "provincecode = " . $_POST['provincecode'];
        } else {
            $where = "provincecode = 110000";
        }
        $data = findMore('city', [], 'code,name', $where, '', '');
        if ($data) {
            $option = '<option value="">---请选择---</option>';
            foreach ($data as $key => $value) {
                $option .= '<option value="' . $value['code'] . '">' . $value['name'] . '</option>';
            }
            echo json_encode(array('error' => 0, 'option' => $option));
        } else {
            echo json_encode(array('error' => 1));
        }
    }

    public function area()
    {
        $cityid = $_POST;
        if ($cityid) {
            $where = "citycode = " . $_POST['citycode'];
        } else {
            $where = "citycode = 110100";
        }
        $data = findMore('area', [], 'code,name', $where, '', '');
        if ($data) {
            $option = '<option value="">---请选择---</option>';
            foreach ($data as $key => $value) {
                $option .= '<option value="' . $value['name'] . '">' . $value['name'] . '</option>';
            }
            echo json_encode(array('error' => 0, 'option' => $option));
        } else {
            echo json_encode(array('error' => 1));
        }
    }

    public function info()
    {
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findone('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.user_id,a.type', ['a.id' => input('id')]);
        return $data;
    }

    public function add()
    {
        $data = $_POST;
        $data['price'] = $data['price_min'] . "-" . $data['price_max'];
        $data['area'] = $data['area_min'] . "-" . $data['area_max'];
        $city = findone('city', [], 'name', ['code' => $data['city']]);
        $province = findone('province', [], 'name', ['code' => $data['province']]);
        $data['city'] = $city['name'];
        $data['province'] = $province['name'];
        $data['district'] = $data['province'] . $data['city'] . $data['area1'];
        unset($data['price_min']);
        unset($data['price_max']);
        unset($data['area_min']);
        unset($data['area_max']);
        $add = addData('sell_house', $data);
        if ($add) {
            return true;
        } else {
            msgback('添加异常！');
        }

    }

    public function edit()
    {
        $data = $_POST;
        $data['price'] = $data['price_min'] . "-" . $data['price_max'];
        $data['area'] = $data['area_min'] . "-" . $data['area_max'];
        $city = findone('city', [], 'name', ['code' => $data['city']]);
        $province = findone('province', [], 'name', ['code' => $data['province']]);
        $data['city'] = $city['name'];
        $data['province'] = $province['name'];
        $data['district'] = $data['province'] . $data['city'] . $data['area1'];
        unset($data['price_min']);
        unset($data['price_max']);
        unset($data['area_min']);
        unset($data['area_max']);
        $edit = edit('sell_house', ['id' => input('id')], $data);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function infoGeta()
    {
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findone('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name', ['a.id' => input('id')]);
        return $data;
    }

    public function addGet()
    {
        $data = $_POST;
        $add = addData('get_house', $data);
        if ($add) {
            return true;
        } else {
            msgback('添加异常！');
        }

    }

    public function editGet()
    {
        $data = $_POST;
        $edit = edit('get_house', ['id' => input('id')], $data);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function infoRenta()
    {
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findone('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type', ['a.id' => input('id')]);
        return $data;
    }

    public function addRent()
    {
        $data = $_POST;
        $add = addData('rent', $data);
        if ($add) {
            return true;
        } else {
            msgback('添加异常！');
        }

    }

    public function editRent()
    {
        $data = $_POST;
        $edit = edit('rent', ['id' => input('id')], $data);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function infoRecruita()
    {
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findone('recruit', $join, 'a.id,a.name,a.phone,a.job,a.price,a.role,a.address,u.user_name', ['a.id' => input('id')]);
        return $data;
    }

    public function addRecruit()
    {
        $data = $_POST;
        $add = addData('recruit', $data);
        if ($add) {
            return true;
        } else {
            msgback('添加异常！');
        }

    }

    public function editRecruit()
    {
        $data = $_POST;
        $edit = edit('recruit', ['id' => input('id')], $data);
        if ($edit) {
            return true;
        } else {
            msgback('修改异常！');
        }
    }

    public function del()
    {
        $del = del('sell_house', ['id' => input('id')]);
        if ($del) {
            return true;
        } else {
            msgback('删除异常！');
        }
    }

    public function delRent()
    {
        $del = del('rent', ['id' => input('id')]);
        if ($del) {
            return true;
        } else {
            msgback('删除异常！');
        }
    }

    public function delRecruit()
    {
        $del = del('recruit', ['id' => input('id')]);
        if ($del) {
            return true;
        } else {
            msgback('删除异常！');
        }
    }

    public function delGet()
    {
        $del = del('get_house', ['id' => input('id')]);
        if ($del) {
            return true;
        } else {
            msgback('删除异常！');
        }
    }
    public function category()
    {
        $type = findMore('category',[],'id,name','','','');
        return $type;
    }
}