<?php
namespace app\api\controller;

use think\db;
use think\Request;
use think\controller\Rest;
use app\api\model\Search as S;

header('Access-Control-Allow-Origin:*');

class Search extends Rest
{
    /*搜索*/
    public function index($id)
    {
        $user = new S;
        $find = $user->index();
        if ($find) {
            echo json(200, $find);
        } else {
            echo json(200, '');
        }
    }
    /*城市搜索*/
    public function citySearch()
    {
        $user = new S;
        $find = $user->city();
        if ($find) {
            echo json(200, $find);
        } else {
            echo json(200, '');
        }
    }
}
