<?php
namespace app\admin\model;
use \think\Model;
/**
*
*/
class Tags extends Model
{
	public function article()
	{
		return $this->belongsToMany('article','article_tags','article_id','tags_id');
	}
}
