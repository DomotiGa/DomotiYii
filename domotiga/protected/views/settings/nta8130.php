<?php
/* @var $this SettingsNta8130Controller */
/* @var $model SettingsNta8130 */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-nta8130-nta8130-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Nta8130 Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->dropDownListRow($model,'type', array('serial' => 'serial', 'tcp' => 'tcp')); ?>
		<?php echo $form->error($model,'type'); ?>

		<?php echo $form->textFieldRow($model,'tcphost'); ?>
		<?php echo $form->error($model,'tcphost'); ?>

		<?php echo $form->textFieldRow($model,'tcpport'); ?>
		<?php echo $form->error($model,'tcpport'); ?>

		<?php echo $form->textFieldRow($model,'serialport'); ?>
		<?php echo $form->error($model,'serialport'); ?>

		<?php echo $form->textFieldRow($model,'databits'); ?>
		<?php echo $form->error($model,'databits'); ?>

		<?php echo $form->textFieldRow($model,'stopbits'); ?>
		<?php echo $form->error($model,'stopbits'); ?>

		<?php echo $form->textFieldRow($model,'parity'); ?>
		<?php echo $form->error($model,'parity'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
