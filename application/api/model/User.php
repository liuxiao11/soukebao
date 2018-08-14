<?php
namespace app\api\model;

use think\Request;
use think\Model;

class User extends Model
{
    /*个人信息*/
    public function index()
    {
        $id = Request::instance()->param();
        $find = findone('user', [], 'a.id,a.user_name,a.wx_avaurl,a.wx_name,a.role,a.phone,a.wx_sex', ['a.id' => $id['id']]);
        if ($find) {
            return $find;
        } else {
            return false;
        }
    }
    public function kfPhone()
    {
        $find = findone('admin', [], 'kf_phone', ['id' => 1]);
        if ($find) {
            return $find['kf_phone'];
        } else {
            return false;
        }
    }
    /*个人信息修改*/
    public function edit()
    {
        $data = Request::instance()->param();
        $data['id'] = $data['user_id'];
        $find = findone('user',[],'user_name,phone,role',['id'=>$data['id']]);
        if($data['user_name'] == "" || $data['user_name'] == $find['user_name']){
           unset($data['user_name'])  ;
        }
        if($data['phone'] == "" || $data['phone'] == $find['phone']){
            unset($data['phone']) ;
        }
        if($data['role'] == "" || $data['role'] == $find['role']){
            unset($data['role']) ;
        }
        unset($data['user_id']);
        $edit = edit('user', ['id' => $data['id']], $data);
        if ($edit) {
            return $data['id'];
        } else {
            return false;
        }
    }

    /*我的发布*/
    public function myMsg()
    {
        $id = Request::instance()->param();
        $join = [
            ['user u', 'u.id = a.user_id'],
        ];
        /*卖房信息*/
        $sell11 = findMoreS('sell_house', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.status,a.identity', '', ['user_id' => $id['id']], '', 'a.id desc');
        $sell = [];
        if ($sell11) {
            foreach ($sell11 as $item) {
                $item['img'] = json_decode($item['img'], true)[0];
                $sell[] = $item;
            }
        }
        /*买房信息*/
        $get = findMoreS('get_house', $join, 'a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.create_time,a.status,u.wx_avaurl', '', ['user_id' => $id['id']], '', 'a.id desc');
        /*出租信息*/
        $rent111 = findMoreS('rent', $join, 'a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des,a.status,a.identity', '', ['user_id' => $id['id']], '', 'a.id desc');
        $rent = [];
        if ($rent111) {
            foreach ($rent111 as $item) {
                $item['img'] = json_decode($item['img'], true)[0];
                $rent[] = $item;
            }
        }
        /*招聘信息*/
        $recruit11 = findMoreS('recruit', $join, 'a.id,a.name,a.phone,a.job,a.price,a.role,a.address,u.user_name,a.img,a.create_time,a.des,a.status,a.identity', '', ['user_id' => $id['id']], '', 'a.id desc');
        $recruit = [];
        if ($recruit11) {
            foreach ($recruit11 as $item) {
                $item['img'] = json_decode($item['img'], true)[0];
                $recruit[] = $item;
            }
        }
        if($get){
            foreach($get as $item){
                $item['source'] = 1;
                $get1[] = $item;
            }
        }else{
            $get1 = '';
        }
        if($sell){
            foreach($sell as $item){
                $item['source'] = 2;
                $sell1[] = $item;
            }
        }else{
            $sell1 = '';
        }
        if($rent){
            foreach($rent as $item){
                $item['source'] = 3;
                $rent1[] = $item;
            }
        }else{
            $rent1 = '';
        }
        if($recruit){
            foreach($recruit as $item){
                $item['source'] = 4;
                $recruit1[] = $item;
            }
        }else{
            $recruit1 = '';
        }
        $data = [
            'sell_house' => $sell1,
            'get_house' => $get1,
            'rent' => $rent1,
            'recruit' => $recruit1,
        ];
        return $data;
    }

    /*个人发布删除*/
    public function myMsgDel()
    {
        $data = json_decode(Request::instance()->param()['id'], true);
        $id = $data['msg_id'];
        if ($data['type'] == 2) {
            $del = del('sell_house', ['id' => $id]);
        } elseif ($data['type'] == 1) {
            $del = del('get_house', ['id' => $id]);
        } elseif ($data['type'] == 3) {
            $del = del('rent', ['id' => $id]);
        } elseif ($data['type'] == 4) {
            $del = del('recruit', ['id' => $id]);
        }
        if ($del) {
            return true;
        } else {
            return false;
        }
    }
    /*所有房源类型*/
    public function type()
    {
        $type = findMore('category',[],'id,name,icon,color','','','');
        return $type;
    }
    public function pay()
    {
        $find = findone('system', [], 'money', ['id' => 1]);
        if ($find) {
            return $find['money'];
        } else {
            return '';
        }
    }
}