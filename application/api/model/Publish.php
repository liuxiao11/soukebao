<?php
namespace app\api\model;

use think\Request;
use think\Model;

class Publish extends Model
{
    /*求购信息*/
    public function index()
    {
        $data = Request::instance()->param();
        $data['district'] = $data['province'] . $data['city'] . $data['area1'];
        $add = addId('get_house', $data);
        if ($add) {
            return $add;
        } else {
            return false;
        }
    }

    /*发布卖房*/
    public function sell()
    {
        $data = Request::instance()->param();
        $data['district'] = $data['province'] . $data['city'] . $data['area1'];
        $add = addId('sell_house', $data);
        if ($add) {
            return $add;
        } else {
            return false;
        }
    }

    /*发布租房*/
    public function rent()
    {
        $data = Request::instance()->param();
        $data['district'] = $data['province'] . $data['city'] . $data['area1'];
        $add = addId('rent', $data);
        if ($add) {
            return $add;
        } else {
            return false;
        }
    }

    /*发布招聘*/
    public function recruit()
    {
        $data = Request::instance()->param();
        $data['district'] = $data['province'] . $data['city'] . $data['area1'];
        $add = addId('recruit', $data);
        if ($add) {
            return $add;
        } else {
            return false;
        }
    }
}