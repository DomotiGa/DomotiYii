<?php
/* @var $this SettingsCulController */
/* @var $model SettingsCul */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-cul-cul-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>CUL Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->dropDownListRow($model,'model', array('1' => 'CUL', '2' => 'CUN', '3' => 'CUNO', '4' => 'CUR')); ?>

		<?php echo $form->error($model,'model'); ?>

		<?php echo $form->textFieldRow($model,'fhtid'); ?>
		<?php echo $form->error($model,'fhtid'); ?>

		<?php echo $form->dropDownListRow($model,'type', array('serial' => 'serial', 'tcp' => 'tcp')); ?>
		<?php echo $form->error($model,'type'); ?>

		<?php echo $form->textFieldRow($model,'tcphost'); ?>
		<?php echo $form->error($model,'tcphost'); ?>

		<?php echo $form->textFieldRow($model,'tcpport'); ?>
		<?php echo $form->error($model,'tcpport'); ?>

		<?php echo $form->textFieldRow($model,'serialport'); ?>
		<?php echo $form->error($model,'serialport'); ?>

		<?php echo $form->textFieldRow($model,'baudrate'); ?>
		<?php echo $form->error($model,'baudrate'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
