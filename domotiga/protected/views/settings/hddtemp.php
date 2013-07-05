<?php
/* @var $this SettingsHddtempController */
/* @var $model SettingsHddtemp */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-hddtemp-hddtemp-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Hddtemp Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'tcphost'); ?>
		<?php echo $form->error($model,'tcphost'); ?>

		<?php echo $form->textFieldRow($model,'tcpport'); ?>
		<?php echo $form->error($model,'tcpport'); ?>

		<?php echo $form->textFieldRow($model,'polltime'); ?>
		<?php echo $form->error($model,'polltime'); ?>

		<?php echo $form->textFieldRow($model,'threshold'); ?>
		<?php echo $form->error($model,'threshold'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
