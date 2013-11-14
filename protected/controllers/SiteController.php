<?php

class SiteController extends ProjectController
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	public function actionIndex(){
		$categories = Categories::model()->gets();
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
		$this->render('index',array(
			'skills'=>$data
		));
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = "error";
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
				$this->render('error', $error);
			}
		}
	}

	
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		// if(isset($_POST['ContactForm']))
		// {
			// $model->attributes=$_POST['ContactForm'];
			// if($model->validate())
			// {
				// $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				// $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				// $headers="From: $name <{$model->email}>\r\n".
					// "Reply-To: {$model->email}\r\n".
					// "MIME-Version: 1.0\r\n".
					// "Content-type: text/plain; charset=UTF-8";

				// mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				// Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				// $this->refresh();
			// }
		// }
		$this->render('contactus',array('model'=>$model));
	}

	
	
}
