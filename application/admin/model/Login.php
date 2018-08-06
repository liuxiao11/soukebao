<?php
namespace app\admin\model;

use think\Model;

class Login extends Model
{
    public function index()
    {
        $admin = findone('admin', [], 'id,admin_name', ['admin_name' => $_POST['account'], 'admin_pwd' => md5($_POST['password'])]);
        if ($admin) {
            $data['last_login_time'] = date('Y-m-d H:i:s');
            edit('admin', ['id' => $admin['id']], $data);
            session('admin', $admin['admin_name']);
            return $admin;
        } else {
            return false;
        }
    }
}