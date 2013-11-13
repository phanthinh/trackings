<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<?php echo $this->renderPartial('ace.views.partial.breadcrumb',array(
			'data'=>array(
				0=>array(
					'name'=>"Update image",
					'active'=>true
				)
			)
		));?>
		<?php echo $this->renderPartial('ace.views.partial.form-search-mini',array(
			'name'=>'name',
			'value'=>!empty($name) ? $name : "",
			'url'=>Yii::app()->createUrl("categories/admin")
		));?>
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>
				Dashboard
				<small>
					<i class="icon-double-angle-right"></i>
					Update image 
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">



				<div class="container-fluid">
					<div class="row-fluid">
						<div class="span12">
							<?php
							$this->widget('ext.xupload.XUpload', array(
								'url' => Yii::app()->createUrl("images/admin/upload"),
								'model' => $modelXUploadForm,
								'attribute' => 'file',
								'multiple' => true,
								'options' => array(
									'maxNumberOfFiles'=>200,
									'maxFileSize'=>10000000,
									'acceptFileTypes' => "js:/(\.|\/)(jpe?g|png)$/i",
									'submit' => "js:function (e, data) {
										var inputs = data.context.find(':input');
										data.formData = inputs.serializeArray();
									}",
									'success' =>"js:function(res){
										console.log(res);
										$.post('".Yii::app()->createUrl("images/admin/create")."',{name:res[0].name},function(data){
											$('#Categories_image_id').val(data.id);
										});
									}"
									
								)
							));
							?>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span12">
						
							
							<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

						</div>
					</div>
				</div>
				
				
				

				
				
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->