<?php
namespace app\api\model;

use think\Request;
use think\Model;

class Des extends Model
{
    /*求购信息*/
    public function index()
    {
        $id = Request::instance()->param()['id'];
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findone('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.create_time', ['a.id' => $id]);
        if ($data) {
            return $data;
        } else {
            return "";
        }
    }

    /*卖房*/
    public function sell()
    {
        $id = Request::instance()->param()['id'];
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findone('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', ['a.id' => $id]);
        if ($data) {
            return $data;
        } else {
            return "";
        }
    }

    /*租房*/
    public function rent()
    {
        $id = Request::instance()->param()['id'];
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findone('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', ['a.id' => $id]);
        if ($data) {
            return $data;
        } else {
            return "";
        }
    }

    /*招聘*/
    public function recruit()
    {
        $id = Request::instance()->param()['id'];
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $data = findone('recruit', $join, 'a.id,a.name,a.phone,a.job,a.price,a.role,a.address,u.user_name,a.img,a.create_time,a.des,a.identity', ['a.id' => $id]);
        if ($data) {
            return $data;
        } else {
            return "";
        }
    }
    /*二手房公寓写字楼详情*/
    public function house()
    {
        $id = json_decode(Request::instance()->param()['id'],true);
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        $where = ['a.id'=>$id['msg_id']];
        if($id['type'] == 1){//求购
            $data = findone('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.name,a.create_time', $where);
        }elseif($id['type'] == 3){ //租房
            $data = findone('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity',  $where);
        }elseif($id['type'] == 2) { //卖房
            $data = findone('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.identity', $where);
        }
        if (!$data) {
            $data = "";
        }
        return $data;
    }
}