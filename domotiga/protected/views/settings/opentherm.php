<?php
/* @var $this SettingsOpenthermController */
/* @var $model SettingsOpentherm */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-opentherm-opentherm-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>OpenTherm Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'serialport'); ?>
		<?php echo $form->error($model,'serialport'); ?>

		<?php echo $form->textFieldRow($model,'polltime'); ?>
		<?php echo $form->error($model,'polltime'); ?>

		<?php echo $form->dropDownListRow($model,'thermostat', array('Other' => 'Other', 'Remeha Celcia' => 'Remeha Celcia')); ?>
		<?php echo $form->error($model,'thermostat'); ?>

		<?php echo $form->dropDownListRow($model,'temperatureoverride', array('Constant' => 'Constant', 'Temporarily' => 'Temporarily')); ?>
		<?php echo $form->error($model,'temperatureoverride'); ?>

		<?php echo $form->checkBoxRow($model,'outsidesensor'); ?>
		<?php echo $form->error($model,'outsidesensor'); ?>

		<?php echo $form->checkBoxRow($model,'syncclock'); ?>
		<?php echo $form->error($model,'syncclock'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
