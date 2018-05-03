<?php
namespace app\admin\controller;
use \think\Controller;
/**
 *管理员控制器
 */
class Admin extends Controller
{
  // 添加管理员界面显示
  public function add()
  {
    return view();
  }

  // 添加管理员提交处理
  public function addhanddle()
  {
    // 判断是否是POST请求
    if (request()->isPost()) {
      // 获取post信息
      $post = request()->post();
      // 进行信息验证，略；
      $post['password'] = md5($post['password']);
      $adminInsertResult = db('admin')->insert($post);
      if ($adminInsertResult) {
        $this->success("管理员添加成功！",'admin/admin/lst');
      } else {
        $this->error("管理员添加失败",'admin/admin/lst');
      }

    } else {
      $this->redirect('admin/admin/lst');
    }

  }
  // 管理员列表界面的实现
  public function lst()
  {
    $admin_select = db("admin")->field('name,id')->select();
    $this->assign("admin_select",$admin_select);
    return view();
  }

  // 管理员修改界面显示
  public function upd($id='')
  {
    // 查找需要修改的管理员
    $admin_find = db('admin')->find($id);
    // 如果找不到对应管理员的信息，则跳转到管理员界面
    if (!$admin_find) {
      $this->redirect("admin/admin/lst");
    } else {
      $this->assign("admin_find",$admin_find);
    }
    return view();
  }

  public function updhanddle()
  {
      // 判断是否是post请求，是继续，不是直接跳转到管理员列表
      if (request()->isPost()) {
          // 获取post信息
          $post = request()->post();
          // 查找对应id的管理员信息
          $admin_find = db("admin")->find($post['id']);
          // 如果查找不到对应的信息，特跳转到管理员列表
          if (empty($admin_find)) {
              $this->redirect("admin/admin/lst");
          } else{
              // 如果查找不到对应的信息，则将查找到的信息中的密码和用户提交的密码进行对比
              if ($admin_find['password']==md5($post["password_old"])) {
                  // 如果密码相同，则继续，对新密码进行验证
                  // 实例化一个验证器
                  $validate = validate("admin");
                  if ($validate->check($post)) {
                      // 如果通过验证，则进行数据库的更新
                      $admin_update_result = db('admin')->update(['password'=>md5($post['password_new']),'id'=>$post['id']]);
                      if ($admin_update_result !== false) {
                          // 成功...
                          $this->success("管理员修改成功！",'admin/admin/lst');
                      } else {
                          // 失败...
                          $this->error("管理员修改失败！","admin/admin/lst");
                      }

                  } else {
                      // 如果不通过验证，提示错误信息，并跳转
                      $this->error($validate->getError());
                  }
              } else {
                  // 如果密码不相同，则提示用户，原来的密码输入错误;
                  $this->error("原来的密码错误，请重试");
              }

          }
      } else {
          // 不是通过post请求访问本页面，直接跳转
          $this->redirect("admin/admin/lst");
      }
  }
}
