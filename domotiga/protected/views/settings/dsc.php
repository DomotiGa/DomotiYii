<?php
/* @var $this SettingsDscController */
/* @var $model SettingsDsc */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-dsc-dsc-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>DSC Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->dropDownListRow($model,'type', array('0' => 'PC5401', '1' => 'IT100')); ?>
		<?php echo $form->error($model,'type'); ?>

		<?php echo $form->passwordFieldRow($model,'mastercode'); ?>
		<?php echo $form->error($model,'mastercode'); ?>

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
