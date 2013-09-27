<?php
/* @var $this DevicetypesController */
/* @var $model Devicetypes */
?>

<?php
$this->breadcrumbs=array(
	'Devicetypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Devicetypes', 'url'=>array('index')),
	array('label'=>'Manage Devicetypes', 'url'=>array('admin')),
);
?>

<h1>Create Devicetypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>