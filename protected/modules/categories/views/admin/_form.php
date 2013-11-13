<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'categories-form',
	'htmlOptions'=>array(
		'class'=>'form-horizontal'
	),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	<div class="space-4"></div>

	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'alias',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	<div class="space-4"></div>
	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'image_id',array('class'=>'span5','maxlength'=>200)); ?>
		</div>
	</div>
	<div class="space-4"></div>


	<div class="form-group">

		<div class="col-sm-9">
			<?php echo $form->textFieldRow($model,'created',array('class'=>'span5','maxlength'=>200)); ?>
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

</div><!-- form -->