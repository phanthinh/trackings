<?php

class CategoriesController extends Controller
{
	public function actionIndex()
	{
		$categories = Categories::model()->gets();
		$data = array();
		foreach($categories as $key=>$category){
			$image = $category->image;
			$category->id = outStr($category->id);
			$image = Images::model()->findByPk($category->image_id);
			$category->image_id = outStr($category->image_id);
			$arr = $category->attributes;
			// dump($image);
			
			$arr['thumb'] = !empty($image) ? Yii::app()->createAbsoluteUrl("/upload/images/thumbs/90-90/{$image->name}") : null;
			$data[] = $arr;
		}
		jsonOut(array(
			'error'=>!empty($data) ? false : true,
			'data'=>$data
		));
	}
}