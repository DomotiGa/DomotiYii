<?php
/* @var $this DevicetypesController */
/* @var $model Devicetypes */
?>

<?php
$this->breadcrumbs=array(
	'Devicetypes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Devicetypes', 'url'=>array('index')),
	array('label'=>'Create Devicetypes', 'url'=>array('create')),
	array('label'=>'Update Devicetypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Devicetypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Devicetypes', 'url'=>array('admin')),
);
?>

<h1>View Devicetypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'description',
		'type',
		'addressformat',
		'onicon',
		'officon',
		'dimicon',
		'switchable',
		'dimable',
		'extcode',
		'label',
		'label2',
		'label3',
		'label4',
	),
)); ?>