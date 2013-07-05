<?php
/* @var $this DevicesController */
/* @var $data Devices */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('module')); ?>:</b>
	<?php echo CHtml::encode($data->module); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value2')); ?>:</b>
	<?php echo CHtml::encode($data->value2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('value3')); ?>:</b>
	<?php echo CHtml::encode($data->value3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value4')); ?>:</b>
	<?php echo CHtml::encode($data->value4); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('correction')); ?>:</b>
	<?php echo CHtml::encode($data->correction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correction2')); ?>:</b>
	<?php echo CHtml::encode($data->correction2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correction3')); ?>:</b>
	<?php echo CHtml::encode($data->correction3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correction4')); ?>:</b>
	<?php echo CHtml::encode($data->correction4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('onicon')); ?>:</b>
	<?php echo CHtml::encode($data->onicon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('officon')); ?>:</b>
	<?php echo CHtml::encode($data->officon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dimicon')); ?>:</b>
	<?php echo CHtml::encode($data->dimicon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interface')); ?>:</b>
	<?php echo CHtml::encode($data->interface); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstseen')); ?>:</b>
	<?php echo CHtml::encode($data->firstseen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastseen')); ?>:</b>
	<?php echo CHtml::encode($data->lastseen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hide')); ?>:</b>
	<?php echo CHtml::encode($data->hide); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log')); ?>:</b>
	<?php echo CHtml::encode($data->log); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logdisplay')); ?>:</b>
	<?php echo CHtml::encode($data->logdisplay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logspeak')); ?>:</b>
	<?php echo CHtml::encode($data->logspeak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('groups')); ?>:</b>
	<?php echo CHtml::encode($data->groups); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rrd')); ?>:</b>
	<?php echo CHtml::encode($data->rrd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('graph')); ?>:</b>
	<?php echo CHtml::encode($data->graph); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batterystatus')); ?>:</b>
	<?php echo CHtml::encode($data->batterystatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tampered')); ?>:</b>
	<?php echo CHtml::encode($data->tampered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valuerrddsname')); ?>:</b>
	<?php echo CHtml::encode($data->valuerrddsname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value2rrddsname')); ?>:</b>
	<?php echo CHtml::encode($data->value2rrddsname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value3rrddsname')); ?>:</b>
	<?php echo CHtml::encode($data->value3rrddsname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value4rrddsname')); ?>:</b>
	<?php echo CHtml::encode($data->value4rrddsname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valuerrdtype')); ?>:</b>
	<?php echo CHtml::encode($data->valuerrdtype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value2rrdtype')); ?>:</b>
	<?php echo CHtml::encode($data->value2rrdtype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value3rrdtype')); ?>:</b>
	<?php echo CHtml::encode($data->value3rrdtype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value4rrdtype')); ?>:</b>
	<?php echo CHtml::encode($data->value4rrdtype); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('x')); ?>:</b>
	<?php echo CHtml::encode($data->x); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('y')); ?>:</b>
	<?php echo CHtml::encode($data->y); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('floorplan')); ?>:</b>
	<?php echo CHtml::encode($data->floorplan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastchanged')); ?>:</b>
	<?php echo CHtml::encode($data->lastchanged); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repeatstate')); ?>:</b>
	<?php echo CHtml::encode($data->repeatstate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repeatperiod')); ?>:</b>
	<?php echo CHtml::encode($data->repeatperiod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reset')); ?>:</b>
	<?php echo CHtml::encode($data->reset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resetperiod')); ?>:</b>
	<?php echo CHtml::encode($data->resetperiod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resetvalue')); ?>:</b>
	<?php echo CHtml::encode($data->resetvalue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poll')); ?>:</b>
	<?php echo CHtml::encode($data->poll); ?>
	<br />

	*/ ?>

</div>