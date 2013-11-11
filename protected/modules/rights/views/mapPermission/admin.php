<?php
/* @var $this MapPermissionController */
/* @var $model MapPermission */

$this->breadcrumbs=array(
	'Map Permissions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MapPermission', 'url'=>array('index')),
	array('label'=>'Create MapPermission', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('map-permission-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Map Permissions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'map-permission-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(            // display 'create_time' using an expression
            'name'=>'group_id',
            'value'=>'$data->group->name',
        ),
        array(           
            'name'=>'permission_id',
            'value'=>'$data->per->name',
        ),

		array(
			'class'=>'CButtonColumn',
			'template' => '{view} {update} {delete}',
			'buttons' => array(
				'view' => array(									
					'url' => 'array("view","id"=>IDHelper::uuidFromBinary($data->id))',
				),
				'update' => array(
					'url' => 'array("update","id"=>IDHelper::uuidFromBinary($data->id))',
				),
				'delete' => array(
					'url' => 'array("delete","id"=>IDHelper::uuidFromBinary($data->id))',
				),
			),
		),
		
	),

)); ?>
