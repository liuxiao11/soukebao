<?php
namespace app\api\controller;

use think\db;
use think\Request;
use think\controller\Rest;
use app\api\model\Des as D;

header('Access-Control-Allow-Origin:*');

class Des extends Rest
{
    /*求购信息详情*/
    public function getHouseDes($id)
    {
        $user = new D;
        $data = $user->index();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }

    /*卖房*/
    public function sellHouseDes($id)
    {
        $user = new D;
        $data = $user->sell();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }

    /*租房*/
    public function rentDes($id)
    {
        $user = new D;
        $data = $user->rent();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }

    /*招聘*/
    public function recruitDes($id)
    {
        $user = new D;
        $data = $user->recruit();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }
    /*二手房*/
    public function house()
    {
        $user = new D;
        $data = $user->house();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }
}
