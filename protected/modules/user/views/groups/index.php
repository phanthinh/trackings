<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<?php echo $this->renderPartial('ace.views.partial.breadcrumb',array(
			'data'=>array(
				0=>array(
					'name'=>'Manage groups',
					'active'=>true
				)
			)
		));?>
		<?php echo $this->renderPartial('ace.views.partial.form-search-mini',array(
			'name'=>'name',
			'value'=>!empty($name) ? $name : "",
			'url'=>Yii::app()->createUrl("user/groups")
		));?>
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1>
				Dashboard
				<small>
					<i class="icon-double-angle-right"></i>
					Manage groups
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				
				


				<div class="container-fluid">
					<div class="row-fluid">
						<div class="span12">
						
				 
				
				
							<?php if(Yii::app()->user->hasFlash('success')):?>
								<div class="alert alert-success">
									<button class="close" data-dismiss="alert">×</button>
									<strong>Success!</strong> 
									<?php echo Yii::app()->user->getFlash('success'); ?>
								</div>
							<?php endif; ?>
							
							
							<div class="table-responsive">

								<div class="dataTables_wrapper" id="sample-table-2_wrapper" role="grid">
								<?php
								$this->widget('ext.bootstrap.widgets.TbGridView', array(
											'dataProvider'	=> $model,
											'type'			=> 'striped ',
											'columns'		=> array(
												
												array(
													'header'=>'Name',
													'value'=>'$data->name',
													'type'=>'raw'
												),
												
												array(
													'header'=>'Level',
													'value'=>'$data->level',
													'type'=>'raw'
												),
												
												array(
													'header'=>'Action',
													'class'=>'ext.bootstrap.widgets.TbButtonColumn',
													'template'=>'{update}{delete}',
													'buttons' => array(
														'update' => array(
															'label'=>'Update',
															'icon'=>'icon-edit bigger-120',
															'url' => 'Yii::app()->createUrl("/user/groups/update", array("id"=>outStr($data->id)))',
															'options'=>array(
																'class'=>'btn btn-xs btn-info',
															)
														),
														'delete' => array(
															'label'=>'Delete',
															'icon'=>'icon-trash bigger-120',
															'url' => 'Yii::app()->createUrl("/user/groups/delete", array("id"=>outStr($data->id)))',
															'options'=>array(
																'class'=>'btn btn-xs btn-danger',
															)
														)
													),

												),
											),
										));
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<script>
				function addTeam(obj){
					$("#modalAddTeam").trigger('click');
					$("#titleModal").html("Add "+$(obj).attr('name')+ " on team");
					$("#idUser").val($(obj).attr('refid'));
				}
				$().ready(function(e){
					$("#savechanges").click(function(e){
						$("#formRadio").submit();
					});
				});
				</script>


				
				
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->
