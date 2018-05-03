<?php
namespace app\admin\controller;
use \think\Controller;
/**
* 后台标签控制器
*/
class Tags extends Controller
{
	/*标签列表*/
	public function lst()
	{
		// 实例化一个模型
		$tags_model = model('tags');
		// 获取所有的数据
		$tags_all = $tags_model->paginate(5);
		// 将获取到的变量分配到模板上
		$this->assign('tags',$tags_all);
		// 显示模板
		return view();
	}

	/*添加标签显示界面*/
	public function add()
	{
		return view();
	}

	/*添加标签提交处理*/
	public function addhanddle()
	{
		//判断是否是post提交过来的数据
		if(request()->isPost()){
			// 获取post提交过来的数据
			$post = request()->post();

			// 对post传递的数据进行验证
			$validate = validate('Tags');
			if (!$validate->check($post)) {
				$this->error($validate->getError(),'admin/tags/lst');
			}

			// 实例化一个模型tags
			$tags_model = model('Tags');

			//利用模型层进行数据的添加
			$tags_save_result = $tags_model->save($post);
			if ($tags_save_result) {
				$this->success('标签添加成功','admin/tags/lst');
			} else {
				$this->error('标签添加失败','admin/tags/lst');
			}
		} else {
			$this->redirect('admin/tags/lst');
		}
	}

	/*修改标签界面显示*/
	public function upd($id='')
	{
		// 实例化一个模型tags
		$tags_model = model('Tags');
		// 获取对应id的数据
		$tags_get = $tags_model->get($id);
		// 判断数据是否有效，如果无效则跳转到列表界面
		if(empty($tags_get)) {
			$this->redirect('admin/tags/lst');
		} else {
			$this->assign('tag',$tags_get);
			return view();
		}
	}

	/*修改标签提交处理*/
	public function updhanddle()
	{
		// 先判断是否是post方式提交，如果不是则直接跳转到列表界面
		if(request()->isPost()) {
			// 获取post提交过来的数据
			$post = request()->post();
			// 构造验证器
			$validate = validate('Tags');
			// 对数据的有效性进行判断
			if (!$validate->check($post)) {
				$this->error($validate->getError(),'admin/tags/lst');
			} else {
				// 实例化一个Tags模型
				$tags_model = model('Tags');
				// 获取对应id的数据
				$tags_get = $tags_model->get($post['id']);
				// 进行数据的更新
				$tags_update_result = $tags_get->save(['name'=>$post['name']]);
				if ($tags_update_result) {
					// 数据更新成功
					$this->success('标签修改成功','admin/tags/lst');
				} else {
					// 数据更新失败
					$this->error('标签修改失败','admin/tags/lst');
				}
			}
		} else {
			// 不是post方式提交，直接跳转
			$this->redirect('admin/tags/lst');
		}
	}

}