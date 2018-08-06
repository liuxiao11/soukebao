<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Db;
use think\Loader;
use think\config;
use think\Cache;
use think\Request;

function isMobile()
{
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    if (isset ($_SERVER['HTTP_VIA'])) {
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
        );
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}

//弹出消息
function msgback($msg)
{
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
    echo "<script>alert('$msg');window.history.back();  </script>";
}

//查询条数
function dataCount($table, $where)
{
    $data = Db::name($table)->where($where)->count();
    if ($data) {
        return $data;
    } else {
        return 0;
    }
}

//单条查询
function findone($table, $join, $field, $where)
{
    $data = Db::name($table)->alias('a')->join($join)->field($field)->where($where)->find();
    if ($data) {
        return $data;
    } else {
        return false;
    }
}

//多条查询
function findMore($table, $join, $field, $where, $order, $num = '')
{
    $data = Db::name($table)->alias('a')->join($join)->field($field)->where($where)->order($order)->limit($num)->select();
    if ($data) {
        return $data;
    } else {
        return '';
    }
}

//分页
function findMorePg($table, $join, $field, $group, $where, $order, $num)
{
    $data = Db::name($table)->alias('a')->join($join)->field($field)->group($group)->where($where)->order($order)->paginate($num);
    if ($data->items() != array()) {
        return $data;
    } else {
        return false;
    }
}

//分页搜索
function findMorePgS($table, $join, $field, $where, $where1, $group, $order, $num)
{
    $data = Db::name($table)->alias('a')->join($join)->field($field)->whereOr($where)->where($where1)->group($group)->order($order)->paginate($num);
    if ($data->items() != array()) {
        return $data;
    } else {
        return false;
    }
}

//搜索
function findMoreS($table, $join, $field, $where, $where1, $group, $order)
{
    $data = Db::name($table)->alias('a')->join($join)->field($field)->whereOr($where)->where($where1)->group($group)->order($order)->select();
    if ($data) {
        return $data;
    } else {
        return false;
    }
}

//添加数据
function addData($table, $data)
{
    $data = Db::name($table)->insert($data);
    if ($data) {
        return $data;
    } else {
        return msg('添加失败！');
    }
}

//递归处理
function getTree($data, $pId)
{
    $tree = array();
    foreach ($data as $k => $v) {
        if ($v['pid'] == $pId) {
            $v['cnav'] = getTree($data, $v['id']);
            $tree[] = $v;
        }
    }
    return $tree;
}

//添加数据返回id
function addId($table, $data)
{
    $data = Db::name($table)->insertGetId($data);
    if ($data) {
        return $data;
    } else {
        return false;
    }
}

//删除数据
function del($table, $where)
{
    $data = Db::name($table)->where($where)->delete();
    if ($data) {
        return true;
    } else {
        return false;
    }
}

//数据修改
function edit($table, $where, $data)
{
    $data = Db::name($table)->where($where)->update($data);
    if ($data) {
        return $data;
    } else {
        return false;
    }
}

//获取数据数量
function num($table, $where)
{
    $data = Db::name($table)->where($where)->count();
    if ($data) {
        return $data;
    } else {
        return 0;
    }
}

//设置缓存
function setCache($type, $name, $value, $time = 0)
{
    return Cache::store($type)->set($name, $value, $time);
}

//获取缓存
function getCache($type, $name)
{
    return Cache::store($type)->get($name);
}

//分组查询
function group($table, $join, $field, $group, $where, $order)
{
    $data = Db::name($table)->alias('a')->join($join)->field($field)->group($group)->where($where)->order($order)->select();
    if ($data) {
        return $data;
    } else {
        return '';
    }
}

//调用验证
function checkData($val, $data, $scene)
{
    $validate = Loader::validate($val);
    if (!$validate->scene($scene)->check($data)) {
        msgback($validate->getError());
    } else {
        return true;
    }
}

//状态码
function code($code)
{
    switch ($code) {
        case 200:
            return '请求成功！';
            break;
        case 201:
            return '操作成功！';
            break;
        case 202:
            return '请求失败！';
            break;
        case 204 :
            return '删除成功！';
            break;
        case 304 :
            return '数据未改变！';
            break;
        case 400 :
            return '请求错误！';
            break;
        case 404 :
            return '暂无资源！';
            break;
        case 422 :
            return '异常请求！';
            break;
    }
}

function json($code, $data)
{
    $data = ['code' => $code, 'msg' => code($code), 'res' => $data];
    return json_encode($data);
}

//上传文件
function upFile($fileName)
{
    $file = request()->file($fileName);
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


/*获取微信token*/
function wxToken()
{
    $program = config('program');
    $appid = $program['appid'];
    $secret = $program['secret'];
    $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $secret;
    $info = file_get_contents($url);
    $token = json_decode($info, true);
    return $token['access_token'];
}

/*curl post模拟请求数据*/
function postCurl($url, $option, $header = 0, $type = 'POST')
{
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)'); // 模拟用户使用的浏览器
    if (!empty ($option)) {
        $options = json_encode($option);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $options); // Post提交的数据包
    }
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $type);
    $result = curl_exec($curl); // 执行操作
    curl_close($curl); // 关闭CURL会话
    return $result;
}

/*curl get模拟请求数据*/
function getCurl($url)
{
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    print_r($data);
}

/*curl postxml模拟请求数据*/
function postXmlCurl($xml, $url, $useCert = false, $second = 30)
{
    //初始化curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    //设置header
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //post提交方式
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    //运行curl
    $data = curl_exec($ch);
    curl_close($ch);
    //返回结果
    if ($data) {
        echo $data;
        return $data;
    } else {
        $error = curl_errno($ch);
        echo "curl出错，错误码:$error" . "<br>";
        echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
        curl_close($ch);
        return false;
    }
}

/*获取open id*/
function openId($code)
{
    $program = config('program');
    $appid = $program['appid'];
    $secret = $program['secret'];
    $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . $appid . '&secret=' . $secret . '&js_code=' . $code . '&grant_type=authorization_code';
    $info = file_get_contents($url);
    $json = json_decode($info);
    $arr = get_object_vars($json);
    $openid = $arr['openid'];
//    $openid = "oHpuZ5Ths0LY6GDWEVBybZ6RfnxI";
    return $openid;
}
