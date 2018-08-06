<?php
namespace app\api\model;

use think\Request;
use think\Model;
use think\Db;

class Login extends Model
{
    /*全局关键词搜索*/
    public function index()
    {
        $data = json_decode(Request::instance()->param()['id'],true);
        $city = $data['city'];
        if ($data['search']) {
            $where = " ( `a`.`name` LIKE '%".$data['search']."%'  OR `a`.`phone` LIKE '%".$data['search']."%'  OR `a`.`price` LIKE '%".$data['search']."%'  OR `a`.`district` LIKE '%".$data['search']."%'  OR `a`.`area` LIKE '%".$data['search']."%'  OR `a`.`address` LIKE '%".$data['search']."%') AND " ;
        } else {
            $where = '';
        }
        /*卖房信息*/
        $sell = Db::query("SELECT `a`.`id`,`a`.`name`,`a`.`phone`,`a`.`district`,`a`.`area`,`a`.`price`,`a`.`role`,`a`.`address`,`u`.`user_name`,`a`.`type`,`a`.`img`,`a`.`create_time`,`a`.`des` FROM `sell_house` `a` INNER JOIN `user` `u` ON `u`.`id`=`a`.`user_id` WHERE  $where  `status` = 1  AND `a`.`city` = '$city' ORDER BY `a`.`id` DESC");
        /*买房信息*/
        if ($data['search']) {
            $where1 = " ( `a`.`area` LIKE '%".$data['search']."%'  OR `a`.`phone` LIKE '%".$data['search']."%'  OR `a`.`price` LIKE '%".$data['search']."%'  OR `a`.`district` LIKE '%".$data['search']."%'  OR `a`.`address` LIKE '%".$data['search']."%') AND " ;
        } else {
            $where1 = '';
        }
        $get = Db::query("SELECT a.id,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.name,a.create_time FROM `get_house` `a` INNER JOIN `user` `u` ON `u`.`id`=`a`.`user_id` WHERE  $where1  `status` = 1  AND `a`.`city` = '$city' ORDER BY `a`.`id` DESC");
        /*出租信息*/
        $rent = Db::query("SELECT a.id,a.name,a.phone,a.district,a.area,a.price,a.role,a.address,u.user_name,a.type,a.img,a.create_time,a.des FROM `rent` `a` INNER JOIN `user` `u` ON `u`.`id`=`a`.`user_id` WHERE  $where  `status` = 1  AND `a`.`city` = '$city' ORDER BY `a`.`id` DESC");
        /*招聘信息*/
        if ($data['search']) {
            $where2 = " ( `a`.`name` LIKE '%".$data['search']."%'  OR `a`.`phone` LIKE '%".$data['search']."%'  OR `a`.`price` LIKE '%".$data['search']."%'  OR `a`.`job` LIKE '%".$data['search']."%'  OR `a`.`address` LIKE '%".$data['search']."%') AND " ;
        } else {
            $where2 = '';
        }
        $recruit = Db::query("SELECT a.id,a.name,a.phone,a.job,a.price,a.role,a.address,u.user_name,a.img,a.create_time,a.des FROM `recruit` `a` INNER JOIN `user` `u` ON `u`.`id`=`a`.`user_id` WHERE  $where2  `status` = 1  AND `a`.`city` = '$city' ORDER BY `a`.`id` DESC");
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

    /*登陆*/
    public function login()
    {
        $code = isset($_GET['code']) ? $_GET['code'] : "";
        $openid = openId($code);
        $find = findone('user', [], 'id,user_name', ['open_id' => $openid]);
        if ($find) {
            $arr = [
                'last_login' => date('Y-m-d:H:i:s'),
            ];
            $edit = edit('user', ['id' => $find['id']], $arr);
            if ($edit) {
                return $find['id'];
            } else {
                return false;
            }
        } else {
            $arr = [
                'wx_name' => $_GET['nick'],
                'wx_avaurl' => $_GET['avaurl'],
                'open_id' => $openid,
                'create_time' => date('Y-m-d:H:i:s')
            ];
            $add = addId('user', $arr);
            if ($add) {
                return $add;
            } else {
                return false;
            }
        }
    }
    /*手动定位*/
    public function positions()
    {
        $data = json_decode(Request::instance()->param()['id'],true);
        $find = findone('user', [], 'id,user_city', ['id' => $data['user_id']]);
        if ($find) {
            $edit = edit('user', ['id' => $data['user_id']], ['user_city'=>$data['city']]);
            if ($edit) {
                return $data['city'];
            } else {
                return $find['user_city'];
            }
        }
    }
    /*市*/
    public function city()
    {
        $data = findMore('city', [], 'id,code,name', '', '', '');
        return $data;
    }

}