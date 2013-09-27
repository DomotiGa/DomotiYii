<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Devices', 'url'=>array('index')),
	array('label'=>'Manage Devices', 'url'=>array('admin')),
);
?>

<h1>Create Devices</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>