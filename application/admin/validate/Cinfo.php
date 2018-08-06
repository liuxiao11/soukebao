<?php
namespace app\admin\validate;

use think\Validate;

class Cinfo extends Validate
{
    protected $rule = [
		'username' =>  'require',
        'passwd' =>  'require',
    ];

     protected $message = [
		'username'  =>  '用户名必须',
        'passwd'  =>  '密码必须'
    ];
}