<?php
/* @var $this SettingsPlcbusController */
/* @var $model SettingsPlcbus */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-plcbus-plcbus-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>PLCBUS Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'serialport'); ?>
		<?php echo $form->error($model,'serialport'); ?>

		<?php echo $form->textFieldRow($model,'baudrate'); ?>
		<?php echo $form->error($model,'baudrate'); ?>

		<?php echo $form->textFieldRow($model,'housecodes'); ?>
		<?php echo $form->error($model,'housecodes'); ?>

		<?php echo $form->textFieldRow($model,'usercode'); ?>
		<?php echo $form->error($model,'usercode'); ?>

		<?php echo $form->textFieldRow($model,'polltime'); ?>
		<?php echo $form->error($model,'polltime'); ?>

		<?php echo $form->checkBoxRow($model,'threephase'); ?>
		<?php echo $form->error($model,'threephase'); ?>

		<?php echo $form->checkBoxRow($model,'ack'); ?>
		<?php echo $form->error($model,'ack'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
