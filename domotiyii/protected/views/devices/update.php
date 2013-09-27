<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Devices', 'url'=>array('index')),
	array('label'=>'Create Devices', 'url'=>array('create')),
	array('label'=>'View Devices', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Devices', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
