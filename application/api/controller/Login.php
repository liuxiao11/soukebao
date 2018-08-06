<?php
namespace app\api\controller;

use think\Session;
use think\Loader;
use think\Request;
use think\controller\Rest;
use app\api\model\Login as L;

header('Access-Control-Allow-Origin:*');

class Login extends Rest
{
    public function rest()
    {
        switch ($this->method) {
            case 'get':     //获取定位信息
                $this->position($id);
                break;
        }
    }

    /*根据经纬度定位*/
    public function position($id)
    {
        $data1 = Request::instance()->param()['id'];
        $program = config('pay');
        $url = "https://apis.map.qq.com/ws/geocoder/v1/?location=" . $data1 . "&key=" . $program['key'];
        $position = file_get_contents($url);
        $data = json_decode($position, true);
        $province = $data['result']['address_component']['city'];
        echo json('200', $province);
    }

    /*根据经纬度定位*/
    public function positions($id)
    {
        $login = new L();
        $data = $login->positions();
        if ($data) {
            echo json('200', $data);
        } else {
            echo json('202', '');
        }
    }

    /*关键字搜索 */
    public function Search($id)
    {
        $search = new L();
        $data = $search->index();
        echo json('200', $data);
    }

    /*登陆*/
    public function login()
    {
        $login = new L();
        $data = $login->login();
        if ($data) {
            echo json('200', $data);
        } else {
            echo json('202', '');
        }
    }
    /*所有市*/
    public function city()
    {
        $search = new L();
        $data = $search->city();
        if ($data) {
            echo json('200', $data);
        } else {
            echo json('200', '');
        }
    }
}
