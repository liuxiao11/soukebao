<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
		'type' =>  'require',
        'static' =>  'require',
		'agent_id' =>  'require',
    ];

    protected $message = [
		'type'  =>  '用户角色必须',
		'static'  =>  '核审状态必须',
		'agent_id'  =>  '代理角色名称',
    ];
}