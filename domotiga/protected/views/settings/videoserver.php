<?php
/* @var $this SettingsVideoserverController */
/* @var $model SettingsVideoserver */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-videoserver-videoserver-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>IP9100 Videoserver Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'tcphost'); ?>
		<?php echo $form->error($model,'tcphost'); ?>

		<?php echo $form->textFieldRow($model,'tcpport'); ?>
		<?php echo $form->error($model,'tcpport'); ?>

		<?php echo $form->textFieldRow($model,'user'); ?>
		<?php echo $form->error($model,'user'); ?>

		<?php echo $form->passwordFieldRow($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>

		<?php echo $form->textFieldRow($model,'channel1'); ?>
		<?php echo $form->error($model,'channel1'); ?>

		<?php echo $form->textFieldRow($model,'channel2'); ?>
		<?php echo $form->error($model,'channel2'); ?>

		<?php echo $form->textFieldRow($model,'channel3'); ?>
		<?php echo $form->error($model,'channel3'); ?>

		<?php echo $form->textFieldRow($model,'channel4'); ?>
		<?php echo $form->error($model,'channel4'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
