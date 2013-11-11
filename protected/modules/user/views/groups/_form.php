<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'groups-form',
	'htmlOptions'=>array(
		'class'=>'form-horizontal'
	),
	'enableAjaxValidation'=>false,
)); ?>

	
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'level',array('class'=>'span5','maxlength'=>200)); ?>
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
