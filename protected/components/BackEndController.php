<?php

class BackEndController extends Controller {

	
	public function init() {
		parent::init();
		Yii::app()->theme="ace";

	}
	/**
	 * @return array - List of filters
	 */
	public function filters()
	{
		return array();
	}
	



}
