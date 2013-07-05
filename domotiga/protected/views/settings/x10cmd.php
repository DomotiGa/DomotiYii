<?php
/* @var $this SettingsX10cmdController */
/* @var $model SettingsX10cmd */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-x10cmd-x10cmd-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>X10cmd Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->dropDownListRow($model,'type', array('0' => 'CM11A (heyu)', '1' => 'CM15A (cm15ademo)', '2' => 'CM17A (heyu)')); ?> 

		<?php echo $form->error($model,'type'); ?>

		<?php echo $form->textFieldRow($model,'command'); ?>
		<?php echo $form->error($model,'command'); ?>

		<?php echo $form->checkBoxRow($model,'monitor'); ?>
		<?php echo $form->error($model,'monitor'); ?>

		<?php echo $form->checkBoxRow($model,'globalx10'); ?>
		<?php echo $form->error($model,'globalx10'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
