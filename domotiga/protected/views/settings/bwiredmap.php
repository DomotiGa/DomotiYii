<?php
/* @var $this SettingsBwiredmapController */
/* @var $model SettingsBwiredmap */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-bwiredmap-bwiredmap-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>BwiredMap Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'pushtime'); ?>
		<?php echo $form->error($model,'pushtime'); ?>

		<?php echo $form->textFieldRow($model,'website'); ?>
		<?php echo $form->error($model,'website'); ?>

		<?php echo $form->textFieldRow($model,'websitepicurl'); ?>
		<?php echo $form->error($model,'websitepicurl'); ?>

		<?php echo $form->textFieldRow($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>

		<?php echo $form->textFieldRow($model,'city'); ?>
		<?php echo $form->error($model,'city'); ?>

		<?php echo $form->textFieldRow($model,'user'); ?>
		<?php echo $form->error($model,'user'); ?>

		<?php echo $form->passwordFieldRow($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>

		<?php echo $form->textFieldRow($model,'screenname'); ?>
		<?php echo $form->error($model,'screenname'); ?>

		<?php echo $form->textFieldRow($model,'gpslat'); ?>
		<?php echo $form->error($model,'gpslat'); ?>

		<?php echo $form->textFieldRow($model,'gpslong'); ?>
		<?php echo $form->error($model,'gpslong'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
