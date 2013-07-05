<?php
/* @var $this SettingsPachubeController */
/* @var $model SettingsPachube */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-pachube-pachube-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Pachube Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'feed'); ?>
		<?php echo $form->error($model,'feed'); ?>

		<?php echo $form->textFieldRow($model,'pushtime'); ?>
		<?php echo $form->error($model,'pushtime'); ?>

		<?php echo $form->textFieldRow($model,'apikey'); ?>
		<?php echo $form->error($model,'apikey'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
