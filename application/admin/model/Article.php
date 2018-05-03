<?php
namespace app\admin\model;
use \think\Model;
/**
* 
*/
class Article extends Model
{
	public function tags()
	{
		return $this->belongsToMany('Tags','article_tags','tags_id','article_id');
	}
}