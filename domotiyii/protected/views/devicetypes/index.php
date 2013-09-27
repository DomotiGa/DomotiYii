<?php
/* @var $this DevicetypesController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Devicetypes',
);

$this->menu=array(
	array('label'=>'Create Devicetypes','url'=>array('create')),
	array('label'=>'Manage Devicetypes','url'=>array('admin')),
);
?>

<h1>Devicetypes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>