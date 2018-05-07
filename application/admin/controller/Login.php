<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 登录控制器
 */
class Login extends Controller
{
    // 登录界面显示
    public function login()
    {
        return view();
    }

    // 登录信息验证
    public function checkLogin()
    {
        // 检查是否是post请求
        if (request()->isPost()) {
            // 获取POST信息
            $post = request()->post();
            // 查找对应的管理员信息
            $admin_find_result = db("admin")
                ->where("name",$post['name'])
                ->where("password",md5($post['password']))
                ->find();
            if ($admin_find_result) {
                // 如果找到对应的管理员信息，把管理员信息写入到session里面
                session('adminId',$admin_find_result['id']);
                session('adminName',$admin_find_result['name']);
                $this->success("登录成功","admin/index/index");
            } else {
                // 如果找不到对应的管理员信息，则跳转到登录界面
                $this->error("用户或密码错误，请重新输入","admin/login/login");
            }
        } else {
            // 不是则直接跳转到登录界面
            $this->redirect("admin/login/login");
        }
    }

    public function logout()
    {
        session('adminName',null);
        session('adminId',null);
        $this->success("退出成功，请重新登录","admin/login/login");
    }
}
