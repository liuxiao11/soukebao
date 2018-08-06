<?php
namespace app\api\model;

use think\Db;
use think\Request;
use think\Model;

class Search extends Model
{
    /*首页搜索*/
    public function index()
    {
        $data = json_decode(Request::instance()->param()['id'], true);
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $where['a.price'] = array('like', '%' . $data['price'] . '%');
        $where['a.district'] = array('like', '%' . $data['district'] . '%');
        $where['a.area'] = array('like', '%' . $data['area'] . '%');
        $where['status'] = array('=', 1);
        $where['city'] = array('=',$data['city']);
        if ($data['type'] == 1) { //求购信息
            $select = findMoreS('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.create_time', '', $where, '', 'a.id desc');
        } elseif ($data['type'] == 2) {//买房->卖房信息
            $select = findMoreS('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
        } elseif ($data['type'] == 3) {//租房
            $select = findMoreS('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
        } elseif ($data['type'] == 4) {//二手房    1-新房 2-二手房 3-商铺 4-写字楼 5-公寓
            $typeHouse = findone('category', [], 'id,name', ['name' => "二手房"]);
            $where['type'] = array('=', $typeHouse['id']);
            $get = findMoreS('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.name,a.create_time', '', $where, '', 'a.id desc');
            $rent = findMoreS('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
            $sell = findMoreS('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
            if ($get) {
                foreach ($get as $item) {
                    $item['source'] = 1;
                    $get1[] = $item;
                }
            } else {
                $get1 = '';
            }
            if ($sell) {
                foreach ($sell as $item) {
                    $item['source'] = 2;
                    $sell1[] = $item;
                }
            } else {
                $sell1 = '';
            }
            if ($rent) {
                foreach ($rent as $item) {
                    $item['source'] = 3;
                    $rent1[] = $item;
                }
            } else {
                $rent1 = '';
            }
            $select = [
                'sell_house' => $sell1,
                'get_house' => $get1,
                'rent' => $rent1,
            ];
        } elseif ($data['type'] == 5) {//商铺
            $typeHouse = findone('category', [], 'id,name', ['name' => "商铺"]);
            $where['type'] = array('=', $typeHouse['id']);
            $get = findMoreS('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.create_time', '', $where, '', 'a.id desc');
            $rent = findMoreS('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
            $sell = findMoreS('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
            if ($get) {
                foreach ($get as $item) {
                    $item['source'] = 1;
                    $get1[] = $item;
                }
            } else {
                $get1 = '';
            }
            if ($sell) {
                foreach ($sell as $item) {
                    $item['source'] = 2;
                    $sell1[] = $item;
                }
            } else {
                $sell1 = '';
            }
            if ($rent) {
                foreach ($rent as $item) {
                    $item['source'] = 3;
                    $rent1[] = $item;
                }
            } else {
                $rent1 = '';
            }
            $select = [
                'sell_house' => $sell1,
                'get_house' => $get1,
                'rent' => $rent1,
            ];
        } elseif ($data['type'] == 6) {//住宅
            $typeHouse = findone('category', [], 'id,name', ['name' => "公寓"]);
            $where['type'] = array('=', $typeHouse['id']);
            $get = findMoreS('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.create_time', '', $where, '', 'a.id desc');
            $rent = findMoreS('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
            $sell = findMoreS('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
            if ($get) {
                foreach ($get as $item) {
                    $item['source'] = 1;
                    $get1[] = $item;
                }
            } else {
                $get1 = '';
            }
            if ($sell) {
                foreach ($sell as $item) {
                    $item['source'] = 2;
                    $sell1[] = $item;
                }
            } else {
                $sell1 = '';
            }
            if ($rent) {
                foreach ($rent as $item) {
                    $item['source'] = 3;
                    $rent1[] = $item;
                }
            } else {
                $rent1 = '';
            }
            $select = [
                'sell_house' => $sell1,
                'get_house' => $get1,
                'rent' => $rent1,
            ];
        } elseif ($data['type'] == 7) {//写字楼
            $typeHouse = findone('category', [], 'id,name', ['name' => "写字楼"]);
            $where['type'] = array('=', $typeHouse['id']);
            $get = findMoreS('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.create_time', '', $where, '', 'a.id desc');
            $rent = findMoreS('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
            $sell = findMoreS('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
            if ($get) {
                foreach ($get as $item) {
                    $item['source'] = 1;
                    $get1[] = $item;
                }
            } else {
                $get1 = '';
            }
            if ($sell) {
                foreach ($sell as $item) {
                    $item['source'] = 2;
                    $sell1[] = $item;
                }
            } else {
                $sell1 = '';
            }
            if ($rent) {
                foreach ($rent as $item) {
                    $item['source'] = 3;
                    $rent1[] = $item;
                }
            } else {
                $rent1 = '';
            }
            $select = [
                'sell_house' => $sell1,
                'get_house' => $get1,
                'rent' => $rent1,
            ];
        } elseif ($data['type'] == 8) {//招聘
            unset($where['a.area']);
            $where['a.job'] = array('like', '%' . $data['job'] . '%');
            $select = findMoreS('recruit', $join, 'a.id,a.name,a.phone,a.job,a.price,a.role,a.address,u.user_name,a.img,a.create_time,a.des,a.identity', '', $where, '', 'a.id desc');
        }
        return $select;
    }
    /*搜索城市*/
    public function city()
    {
        $search = Request::instance()->param();
        if($search)
        {
            $where['a.name'] = array('like', '%' . $search['id'] . '%');
            $find = findMoreS('city', [], 'a.id,a.name', '', $where, '', '');
            return $find;
        }
    }
}