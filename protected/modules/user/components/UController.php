<?php

class UController extends Controller {

	
	public function init() {
		parent::init();
		Yii::app()->theme="unicorn";
	}

	public function showMessage($title, $content) {
		$this->layout = "ajax";
		$this->render('application.modules.user.views.message', array(
			'title'		=> $title,
			'content'	=> $content,
		));
		exit;
	}
	public function beforeAction(){
		Permission::model()->check();
		
	}
	// public function filters()
	// {
		

	// }
	// public function allowedActions()
	// {
		// return 'index, suggestedTags';
	// }
	



}
