<?php
/* @var $this SettingsGlatitudeController */
/* @var $model SettingsGlatitude */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-glatitude-glatitude-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>GLatitude Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'rangevalue'); ?>
		<?php echo $form->error($model,'rangevalue'); ?>

		<?php echo $form->dropDownListRow($model,'rangetype', array('1' => 'Km\'s', '2' => 'Miles')); ?>
		<?php echo $form->error($model,'rangetype'); ?>

		<?php echo $form->textFieldRow($model,'polltime'); ?>
		<?php echo $form->error($model,'polltime'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
