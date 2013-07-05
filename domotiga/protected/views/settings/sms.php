<?php
/* @var $this SettingsSmsController */
/* @var $model SettingsSms */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-sms-sms-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>SMS Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'serialport'); ?>
		<?php echo $form->error($model,'serialport'); ?>

		<?php echo $form->textFieldRow($model,'baudrate'); ?>
		<?php echo $form->error($model,'baudrate'); ?>

		<?php echo $form->textFieldRow($model,'polltime'); ?>
		<?php echo $form->error($model,'polltime'); ?>

		<?php echo $form->passwordFieldRow($model,'pin'); ?>
		<?php echo $form->error($model,'pin'); ?>

		<?php echo $form->textFieldRow($model,'servicecentre'); ?>
		<?php echo $form->error($model,'servicecentre'); ?>

		<?php echo $form->textFieldRow($model,'contact'); ?>
		<?php echo $form->error($model,'contact'); ?>

		<?php echo $form->textFieldRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
