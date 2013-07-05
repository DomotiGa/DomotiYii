<?php
/* @var $this SettingsDigitempController */
/* @var $model SettingsDigitemp */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-digitemp-digitemp-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Digitemp Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'polltime'); ?>
		<?php echo $form->error($model,'polltime'); ?>

		<?php echo $form->textFieldRow($model,'readtime'); ?>
		<?php echo $form->error($model,'readtime'); ?>

		<?php echo $form->textFieldRow($model,'command'); ?>
		<?php echo $form->error($model,'command'); ?>

		<?php echo $form->textFieldRow($model,'config'); ?>
		<?php echo $form->error($model,'config'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
