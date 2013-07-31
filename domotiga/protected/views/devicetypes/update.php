<?php
/* @var $this DevicetypesController */
/* @var $model Devicetypes */
?>

<?php
$this->breadcrumbs=array(
	'Devicetypes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Devicetypes', 'url'=>array('index')),
	array('label'=>'Create Devicetypes', 'url'=>array('create')),
	array('label'=>'View Devicetypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Devicetypes', 'url'=>array('admin')),
);
?>

<h1>Update Devicetypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>