<?php
/* @var $this YiiGraphsController */
/* @var $data YiiGraphs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group')); ?>:</b>
	<?php echo CHtml::encode($data->group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device_value_01')); ?>:</b>
	<?php echo CHtml::encode($data->device_value_01); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('device_value_02')); ?>:</b>
	<?php echo CHtml::encode($data->device_value_02); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device_value_03')); ?>:</b>
	<?php echo CHtml::encode($data->device_value_03); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device_value_04')); ?>:</b>
	<?php echo CHtml::encode($data->device_value_04); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graph_width')); ?>:</b>
	<?php echo CHtml::encode($data->graph_width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graph_height')); ?>:</b>
	<?php echo CHtml::encode($data->graph_height); ?>
	<br />

	*/ ?>

</div>