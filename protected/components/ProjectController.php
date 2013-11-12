<?php

class ProjectController extends Controller {

	public $des = null;
	public function init() {
		parent::init();
		Yii::app()->theme="frontend";
		
	}
	/**
	 * @return array - List of filters
	 */
	public function filters()
	{
		return array();
	}
	



}
