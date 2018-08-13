<?php
namespace app\api\controller;

use think\db;
use think\Request;
use think\controller\Rest;
use app\api\model\Publish as P;

header('Access-Control-Allow-Origin:*');

class Publish extends Rest
{
    /*求购信息*/
    public function getHouse()
    {
        $user = new P;
        $data = $user->index();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }

    /*发布卖房*/
    public function sellHouse()
    {
        $user = new P;
        $data = $user->sell();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }

    /*发布租房*/
    public function rent()
    {
        $user = new P;
        $data = $user->rent();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }

    /*发布招聘*/
    public function recruit()
    {
        $user = new P;
        $data = $user->recruit();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }
    /*多张图片上传*/
    public function upFiles()
    {
        $file = upFiles('img');
        if($file){
            echo json(200, $file);
        } else {
            echo json(202, '');
        }
    }
}
