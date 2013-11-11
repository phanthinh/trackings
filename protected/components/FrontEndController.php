<?php

class FrontEndController extends Controller {

	
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
