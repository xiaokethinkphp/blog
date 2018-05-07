<?php
namespace app\admin\controller;
/**
* 文章控制器
*/
class Article extends Common
{
	/*添加文章界面显示*/
	public function add()
	{
		return view();
	}

	/*文章提交方法处理*/
	public function addhanddle()
	{
		// 先判断是否是post请求，如果不是则跳转到文章列表界面
		if(request()->isPost()) {
			// 获取post内容
			$post = request()->post();
			// 先进行数据的验证，此处略

			// 获取上传信息
			$file = request()->file('img');
			// 如果获取不到上传信息，则跳转到文章添加界面
			if (empty($file)) {
				$this->error('请选择文章图片','admin/article/add');
			} else {
				// 将图片上传到文件夹
				$info = $file->move('../uploads');
				// 如果图片上传成功，则进行数据库写入，如果失败则跳转到文章添加界面
				if($info) {
					$data = $post;
					$data['img'] = $info->getSaveName();
					$data['create_time'] = time();
					$data['update_time'] = time();
					$article_model = model('article');
					$article_model->save($data);
					$this->redirect('admin/article/add');
				} else {
					$this->error('文章添加失败','admin/article/add');
				}
			}
		} else {
			$this->redirect('admin/article/lst');
		}
	}

	/*文章列表显示*/
	public function lst()
	{
		// 实例化模型层
		$article_model = model('article');
		// $article_model_all = $article_model->all();
		// foreach ($article_model_all as $key => $value) {
		// 	$value->tags;
		// };
		// dump($article_model_all);die;
		// 获取数据并分页
		$article_select = $article_model->paginate(3)
			->each(function($item, $key){
    			$item->tags;
			});
			// dump($article_select->toArray());die;
		// 将数据赋予模板
		$this->assign("article_select",$article_select);
		// 显示模板
		return view();
	}

	/*文章修改界面实现*/
	public function upd($id = '')
	{
		// 实例化模型层
		$article_model = model('article');
		// 获取对应的文章
		$article_get = $article_model::get($id);
		// 判断是否能够获取对应文章，如果获取不到，则跳转到文章列表界面
		if (empty($article_get)) {
			$this->redirect('admin/article/lst');
		} else {
			$this->assign('article_get',$article_get);
			return view();
		}

	}

	/*修改文章提交处理*/
	public function updhanddle()
	{
		// 判断是否是post请求
		if (request()->isPost()) {
			// 获取post信息
			$post = request()->post();
			// 进行post数据的验证。略
			//.....
			//判断是否有文件上传
			$file = request()->file('img');
			if ($file) {
				// 有文件上传,则把文件进行上传
				$info = $file->move('../uploads');
				// 判断文件上传是否成功
				if ($info) {
					// 如果文件上传成功，则将文件信息写入到data当中去,
					$data = $post;
					$article_model = model('article');
					// 获取修改前文章的信息
					$article_old = $article_model->get($post['id']);
					// 得到旧的文章图片信息
					$img_old = $article_old['img'];
					// 获取新的图片路径
					$data['img'] = $info->getSaveName();
					// 同时更新修改时间
					$data['update_time'] = time();
					// 进行数据的更新
					$article_model->save($data,$post['id']);
					// 将文章旧的图片进行删除
					// 判断图片是否存在，存在就删除
					if(file_exists('../uploads/'.$img_old)){
						unlink('../uploads/'.$img_old);
					}
					$this->redirect('admin/article/lst');
				} else {
					// 如果文件上传失败，则跳转到文章列表界面；
					$this->redirect('admin/article/lst');
				}

				# code...
			} else {
				// 没有文件上传，则文章的图片并不发生改变
				# code...
			}

		} else {
			// 不是post请求则直接跳转到文章列表界面
			$this->redirect('admin/article/lst');
		}

	}

	// 无刷新获取标签内容
	public function findTagsAjax()
	{
		//判断是否是ajax请求
		if (request()->isAjax()) {
			// 获取post信息
			$post = request()->post();
			// 获取其中标签的信息
			$tags = $post['tags'];
			// 寻找以他为开头的标签
			$tags_select = db('tags')->where('name','like',$tags.'%')->select();
			return $tags_select;
		} else {
			// 不是ajax请求则跳转文章列表
			$this->redirect('admin/article/lst');
		}

	}
	/*无数新增加article与tags的多对多关联模型*/
	public function articleTagsAjax()
	{
		// 是否是ajax请求
		if (request()->isAjax()) {
			// 获取post信息
			$post = request()->post();
			// 获取文章id
			$article_id = $post['id'];
			// 获取标签内容
			$name = $post['value'];
			// 在数据库中查找标签
			$tags_find = db('tags')->where('name',$name)->find();
			// 标签存在
			if ($tags_find) {
				// 获取标签id
				$tags_find_id = $tags_find['id'];
				// 判断关联表是否已经存在
				$article_tags_find = db('article_tags')->where('article_id',$article_id)->where('tags_id',$tags_find_id)->find();
				if ($article_tags_find) {
					// 存在
					return array('status'=>'-1');
				} else {
					// 实例化模型
					$article_model = model('article');
					// 获取对应id的信息
					$article_get = $article_model->get($article_id);
					// 进行关联表添加
					$article_tags_result = $article_get->tags()->save($tags_find_id);
					if ($article_tags_result) {
						// 添加成功
						return array('status'=>1);
					} else {
						// 添加失败
						return array('status'=>'-2');
					}
				}
			} else {
				// 标签不存在
				return array("status"=>0);
			}
		} else {
			// 不是ajax请求则跳转文章列表
			$this->redirect('admin/article/lst');
		}
	}

	// 无刷新删除文章标签
	public function articleTagsDelAjax()
	{
		//首先判断是否是ajax请求
		if (request()->isAjax()) {
				// 获取POST信息
				$post = request()->post();
				// 实例化模型
				$article_model = model('article');
				// 获取对应id的信息
				$article_get = $article_model->get($post['article_id']);
				// 删除中间表
				$article_get->tags()->detach($post['tags_id']);
		}
	}
}
