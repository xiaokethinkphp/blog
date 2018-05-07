<?php
namespace app\index\controller;
use \think\Controller;
/**
 * 前台公共控制器
 */
class Common extends Controller
{
    public function initialize()
    {
        $article_select_orderByUpdateTime = db('article')
        ->order('update_time desc')->limit(6)->select();

        $article_select_orderByClicks = db('article')
        ->order('clicks desc')->limit(6)->select();
        $tags_select = db('tags')->select();
        $this->assign('article_select_orderByUpdateTime',$article_select_orderByUpdateTime);
        $this->assign('article_select_orderByClicks',$article_select_orderByClicks);
        $this->assign('tags_select',$tags_select);
    }
}
