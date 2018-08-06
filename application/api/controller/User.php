<?php
namespace app\api\controller;

use think\db;
use think\Request;
use think\controller\Rest;
use app\api\model\User as U;

header('Access-Control-Allow-Origin:*');

class User extends Rest
{
    /*个人信息*/
    public function infoPerson($id)
    {
        $user = new U;
        $find = $user->index();
        if ($find) {
            echo json(200, $find);
        } else {
            echo json(202, '');
        }
    }

    /*个人信息修改*/
    public function infoEdit()
    {
        $user = new U;
        $data = $user->edit();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }

    /*我的发布*/
    public function myMsg($id)
    {
        $mymsg = new U;
        $data = $mymsg->myMsg();
        echo json(200, $data);
    }

    /*删除我的发布*/
    public function myMsgDel()
    {
        $mymsg = new U;
        $data = $mymsg->myMsgDel();
        if ($data) {
            echo json(200, '');
        } else {
            echo json(202, '');
        }
    }
    /*房源类型*/
    public function houseType()
    {
        $type = new U;
        $data = $type->type();
        if ($data) {
            echo json(200, $data);
        } else {
            echo json(202, '');
        }
    }
    function upFile()
    {
        $file = request()->file('img');
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {
                return $info->getSaveName();
            } else {
                msgback($file->getError());
                die;
            }
        } else {
            return "";
        }
    }
}
