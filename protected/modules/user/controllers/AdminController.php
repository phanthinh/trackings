<?php

class AdminController extends BackEndController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
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
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk(outBin($id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionCreate()
	{
		$model= new Users;
		$group = Groups::model()->findAll();
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->group_id=outBin($model->group_id);
			$model->birth=$_POST['Users']['birth'];
			$model->username=$_POST['Users']['username'];
			$model->superuser=$_POST['Users']['superuser'];
			
			$model->public_id=Users::createPublicId();
			if($model->validate()){
				// dump($model->attributes);
				$model->password=Users::encodePassword($_POST['Users']['password']);
				if($model->save()){
					$this->redirect(array('index'));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'group'=>$group,
		));
	}
	public function actionUpdate($id=NULL)
	{
		$model=$this->loadModel($id);
		$group = Groups::model()->findAll();
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->group_id=outBin($model->group_id);
			$model->birth=$_POST['Users']['birth'];
			$model->username=$_POST['Users']['username'];
			$model->superuser=$_POST['Users']['superuser'];
			// dump($model->attributes);
			if($model->validate()){
				
				if($model->save())
					$this->redirect(array('index'));
				
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'id'=>$id,
			'group'=>$group,
		));
	}

	
	
	public function actionExport(){
		$filename = "user.xlsx";
		
		$criteria	=	new CDbCriteria;
		
		$result	=	Users::model()->findAll($criteria);
		
		
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		
		$rs = array();
		foreach($result as $key=>$value){
			$value->id = outStr($value->id);
			$rs[] = $value->attributes;
		
		}
		$xls = new JPhpExcel('UTF-8', false, 'Users');
		$xls->addArray($rs);
		$xls->generateXML('users');
		
		
		
		
		
//dump($model);
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex($name=NULL)
	{
		// Yii::app()->theme="ace";
		$this->layout = "//layouts/main";
		
		$criteria	=	new CDbCriteria;
		$criteria->addSearchCondition('first_name',$name,true,'OR');
		$criteria->addSearchCondition('last_name',$name,true,'OR');
		$criteria->addSearchCondition('email',$name,true,'OR');
		$result	=	Users::model()->findAll($criteria);
		$count		=	count($result);
		$pages				=	new CPagination($count);
		$pages->pageSize	=	20;
		$criteria->order = "created DESC";

		
		
		$pages->applyLimit($criteria);
		//$model =	Users::model()->findAll($criteria);
		$model =  new CActiveDataProvider('Users', array(
			'criteria' => $criteria,
			'pagination' => $pages,
		));
		
		$this->render('admin',array(
			'model'=>$model,
			'pages'=>$pages,
			'count'=>$count,
			'name'=>$name,
		));
	}
	public function actionDelete($id=NULL){
		
		$model = Users::model()->findByPk(outBin($id));
		
		
		if($model->delete()){
			$this->redirect(Yii::app()->createUrl('/user/admin'));
			jsonOut(array(
				'msg'=>'Document deleted',
				'error'=>false
			));
				
		}else{
			$errors = $model->getErrors();
			list ($field, $_errors) = each ($errors);
			jsonOut(array(
				'msg'=>'Document failer'.$_errors[0],
				'error'=>true
			));
		}
	}


	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
