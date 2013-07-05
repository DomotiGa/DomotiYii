<?php
/* @var $this SettingsTemperaturnuController */
/* @var $model SettingsTemperaturnu */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-temperaturnu-temperaturnu-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>TemperaturNu Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'pushtime'); ?>
		<?php echo $form->error($model,'pushtime'); ?>

		<?php echo $form->textFieldRow($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>

		<?php echo $form->textFieldRow($model,'apikey'); ?>
		<?php echo $form->error($model,'apikey'); ?>

		<?php echo $form->textFieldRow($model,'deviceid'); ?>
		<?php echo $form->error($model,'deviceid'); ?>

		<?php echo $form->dropDownListRow($model,'devicevalue', array('1' => 'Value', '2' => 'Value2', '3' => 'Value3', '4' => 'Value3')); ?>
		<?php echo $form->error($model,'devicevalue'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
