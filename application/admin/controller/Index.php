<?php
namespace app\admin\controller;
class Index extends Common
{
    public function index()
    {
        return view();
    }
    public function index1()
    {
        session("adminId",null);
        session("adminName",null);
    }
}
