<?php
namespace app\admin\validate;
use \think\Validate;
/**
* 标签的验证
*/
class Tags extends Validate
{
	protected $rule =   [
        'name'  => ['require','min:1','max:10','unique:tags'],
    ];
    
    protected $message  =   [
        'name.require'  =>  '标签名称不能为空',
        'name.min'  =>  '标签长度不能小于1',
        'name.max'  =>  '标签长度不能大于10',
        'name.unique'   =>  '标签名称已经存在'
    ];
    	
}