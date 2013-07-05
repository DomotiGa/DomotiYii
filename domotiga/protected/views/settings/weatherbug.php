<?php
/* @var $this SettingsWeatherbugController */
/* @var $model SettingsWeatherbug */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-weatherbug-weatherbug-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Weatherbug Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'weatherbugid'); ?>
		<?php echo $form->error($model,'weatherbugid'); ?>

		<?php echo $form->textFieldRow($model,'citycode'); ?>
		<?php echo $form->error($model,'citycode'); ?>

		<?php echo $form->textFieldRow($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>

		<?php echo $form->textFieldRow($model,'countryname'); ?>
		<?php echo $form->error($model,'countryname'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
