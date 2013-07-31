<?php
/* @var $this DevicetypesController */
/* @var $data Devicetypes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addressformat')); ?>:</b>
	<?php echo CHtml::encode($data->addressformat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('onicon')); ?>:</b>
	<?php echo CHtml::encode($data->onicon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('officon')); ?>:</b>
	<?php echo CHtml::encode($data->officon); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('dimicon')); ?>:</b>
	<?php echo CHtml::encode($data->dimicon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('switchable')); ?>:</b>
	<?php echo CHtml::encode($data->switchable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dimable')); ?>:</b>
	<?php echo CHtml::encode($data->dimable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extcode')); ?>:</b>
	<?php echo CHtml::encode($data->extcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label')); ?>:</b>
	<?php echo CHtml::encode($data->label); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label2')); ?>:</b>
	<?php echo CHtml::encode($data->label2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label3')); ?>:</b>
	<?php echo CHtml::encode($data->label3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('label4')); ?>:</b>
	<?php echo CHtml::encode($data->label4); ?>
	<br />

	*/ ?>

</div>