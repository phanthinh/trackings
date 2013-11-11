<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'groups-form',
	'htmlOptions'=>array(
		'class'=>'form-horizontal'
	),
	'enableAjaxValidation'=>false,
)); ?>

	
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	
	<div class="space-4"></div>
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	<div class="space-4"></div>
	<?php if(!empty($create)) { ?>
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'password',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	
	<div class="space-4"></div>
	<?php } ?>
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'birth',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
<div class="space-4"></div>	
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'superuser',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	<div class="space-4"></div>
	<?php
	$data = array();
	if(!empty($group)){
		foreach($group as $key=>$value){
			
			$data[outStr($value->id)] = $value->name;
		}
	}
	// dump($data);
	?>
	<div class="form-group">

		<div class="col-sm-9">
		<?php echo $form->dropDownListRow($model, 'group_id', $data,array('options' => array(outStr($model->group_id)=>array('selected'=>true))) ); ?>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Create' : 'Save',
				'htmlOptions'=>array('class'=>'button')
			)); ?>
		</div>
	</div>


<?php $this->endWidget(); ?>
