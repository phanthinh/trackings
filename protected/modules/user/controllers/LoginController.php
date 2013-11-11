<?php

class LoginController extends FrontEndController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/login';

	/**
	 * @return array action filters
	 */
	// public function filters()
	// {
		// return array(
			// 'accessControl', // perform access control for CRUD operations
		// );
	// }

	public function allowedActions() {
		return '*';
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array();
	}
	public function actionIndex(){
		$model = new FormLogin;
		$type = Yii::app()->request->getParam('type',null);
		$_view = "login";
		Yii::app()->theme="frontend";
		if($type!=null){
			$_view = "login_admin";
			Yii::app()->theme="ace";
		}
		
		if(!Yii::app()->user->isGuest)
		{
			$this->redirect(array('/site/index'));
		}
		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(!empty($_POST)){
			$model->attributes = $_POST['FormLogin'];
			
			if($model->validate() && $model->login()){
				if(currentUser()->superuser==1){
					$this->redirect(array('/admin/setting'));
				}else{
					$this->redirect(array('/goals?uId='.outStr(currentUser()->id)));
				}
				
			}
		}
		
		
		
		$this->render($_view,array(
			'model'=>$model
		));
	}

}
