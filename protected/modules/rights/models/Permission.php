<?php

/**
 * This is the model class for table "permissions".
 *
 * The followings are the available columns in table 'permissions':
 * @property string $id
 * @property string $name
 * @property string $alias
 */
class Permission extends JLActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Permission the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'permissions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'length', 'max'=>16),
			array('name, alias', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, alias', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'mapper' => array(self::HAS_MANY, 'MapPermission', 'permission_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'alias' => 'Alias',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('alias',$this->alias,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function check(){
		if(Yii::app()->user->isGuest){
			if(!empty(Yii::app()->user->loginUrl[0])){
				
				Yii::app()->controller->redirect(Yii::app()->user->loginUrl[0]);
			}else{
				
				Yii::app()->controller->redirect(array('/user/login'));
			}
		}else{
			Yii::import('application.modules.rights.models.Role');
			$role = Role::model()->findAllByAttributes(array(
				'group_id'=>currentUser()->group->id
			));
			
			$c = strtolower(Yii::app()->controller->id);
			$a = strtolower(Yii::app()->controller->getAction()->id);
						
			$url = Yii::app()->getUrlManager()->parseUrl(Yii::app()->getRequest());
			$check = false;
			if(currentUser()->superuser==1){
				return true;
			}
			if(!empty($role)){
				foreach($role as $k=>$ro){
					$m = strtolower(Yii::app()->controller->module->id);
					if($ro->module!=NULL){
						
						if(strtolower($ro->module) == strtolower($m) && strtolower($ro->controller) == $c &&  strtolower($ro->view) == $a ){
							$check = true;
						}
					}else{
						if(strtolower($ro->controller) == $c &&  strtolower($ro->view) == $a ){
							$check = true;
						}
					}
				}
			}
			if(!$check){
				throw new CHttpException(400, 'You are not accept permission');
			}else{
				return true;
			}

		}
	}
}