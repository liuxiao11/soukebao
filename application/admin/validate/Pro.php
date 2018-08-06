<?php
namespace app\admin\validate;

use think\Validate;

class Pro extends Validate
{
    protected $rule = [
		'title' =>  'require|unique:pro',
        'price' =>  'require|number',
		'des' =>  'require',
		'banner' =>  'require',
		'content' =>  'require',
    ];

    protected $message = [
		'title.require'  =>  '产品名称必须',
		'title.unique'  =>  '该产品已存在',
        'price.require'  =>  '产品价格必须',
		'price.number'  =>  '产品价格必须为数字',
		'des'  =>  '产品描述必须',
		'banner'  =>  '产品首图必须',
		'content'  =>  '产品详情必须',
    ];
	
	protected $scene = [
        'edit'  =>  ['title'=>'require','price','des']
    ];
}