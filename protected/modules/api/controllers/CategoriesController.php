<?php

class CategoriesController extends Controller
{
	public function actionIndex()
	{
		$page = Yii::app()->request->getParam('page',null);
		$per_page = Yii::app()->request->getParam('per_page',null);
		$categories = Categories::model()->gets($per_page);
		$data = array();
		foreach($categories as $key=>$category){
			$image = $category->image;
			$category->id = outStr($category->id);
			$image = Images::model()->findByPk($category->image_id);
			$category->image_id = outStr($category->image_id);
			$arr = $category->attributes;
			// dump($image);
			
			$arr['thumb'] = !empty($image) ? Yii::app()->createAbsoluteUrl("/upload/images/fill/360-225/{$image->name}") : null;
			$data[] = $arr;
		}
		jsonOut(array(
			'error'=>!empty($data) ? false : true,
			'data'=>$data
		));
	}
}