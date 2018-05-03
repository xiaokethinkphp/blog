<?php
namespace app\admin\validate;
use \think\Validate;
/**
* 标签的验证
*/
class Admin extends Validate
{
	protected $rule =   [
        'password_new'          =>  ['require','min:6','max:10','confirm:password_new_confirm'],
        'password_new_confirm'  =>  ['require','min:6','max:10']
    ];

    protected $message  =   [
        'password_new.require'  =>  '密码不能为空1',
        'password_new.min'  =>  '密码长度不能小于6',
        'password_new.max'  =>  '密码长度不能大于10',
        'password_new_confirm.require'  =>  '密码不能为空2',
        'password_new_confirm.min'  =>  '密码长度不能小于6',
        'password_new_confirm.max'  =>  '密码长度不能大于10',
    ];

}
