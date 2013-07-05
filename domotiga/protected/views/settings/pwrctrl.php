<?php
/* @var $this SettingsPwrctrlController */
/* @var $model SettingsPwrctrl */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-pwrctrl-pwrctrl-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>PwrCtrl Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'udpread'); ?>
		<?php echo $form->error($model,'udpread'); ?>

		<?php echo $form->textFieldRow($model,'udpsend'); ?>
		<?php echo $form->error($model,'udpsend'); ?>

		<?php echo $form->passwordFieldRow($model,'userpw'); ?>
		<?php echo $form->error($model,'userpw'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
