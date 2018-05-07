<?php
namespace app\index\controller;
// use \think\Controller;
/**
*文章控制器
*/
class Article extends Common
{

	public function article($id='')
	{
        // 实例化一个模型，使用命名空间的方式进行访问，注意大小写
        $article_model = model("\app\admin\model\Article");
        // 获取对应的模型
        $article_model_get = $article_model->get($id);
        // 进行判断，若获取不到对应的模型，则跳转，此处略
        $article_model_get->tags;
        $this->assign('article',$article_model_get);
		return view();
	}
}
