<?php
namespace app\admin\validate;

use think\Validate;

class Agent extends Validate
{
    protected $rule = [
		'name' =>  'require|unique:agent',
        'discount' =>  'require|number',
    ];

    protected $message = [
		'name.require'  =>  '代理名称必须',
		'name.unique'  =>  '该代理角色已存在',
        'discount.require'  =>  '优惠必须',
		'discount.number'  =>  '优惠必须为数字'
    ];
	
	protected $scene = [
        'edit'  =>  ['name'=>'require','discount'],
    ];
}