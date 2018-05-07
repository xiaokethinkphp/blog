<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 公共控制器
 */
class Common extends Controller
{
    public function initialize()
    {
        if (session("?adminId")&&session("?adminName")) {
            
        } else {
            $this->error("请先登录","admin/login/login");
        }

    }
}
