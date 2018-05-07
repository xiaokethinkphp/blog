<?php
namespace app\index\controller;
// use \think\Controller;
class Index extends Common
{
    public function index()
    {
        $article_select_result = db("article")->order('update_time desc')->paginate(4);
        $a = $article_select_result->toArray();
        $articles = array_chunk($a['data'], 2);
        $this->assign('article_select_result',$article_select_result);
        $this->assign('articles',$articles);
        return view();
    }

    public function tags($id = '')
    {
        // 实例化一个tags模型
        $tags_model = model("\app\admin\model\Tags");
        // 获取对应的模型信息
        $tags_model_get = $tags_model->get($id);
        // 进行判断，若获取不到对应的模型信息，则跳转，此处略
        // 进行文章的多对多关联
        $tags_model_get->article;
        // 获取其中文章的信息
        $articles = $tags_model_get['article'];
        $articles1 = array_chunk($articles->toArray(), 2);
        $this->assign("articles",$articles1);
        return view();
    }
}
