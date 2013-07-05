<?php
/* @var $this SettingsMainController */
/* @var $model SettingsMain */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-main-main-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Main Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'sleeptime'); ?>
		<?php echo $form->error($model,'sleeptime'); ?>

		<?php echo $form->textFieldRow($model,'flushtime'); ?>
		<?php echo $form->error($model,'flushtime'); ?>

		<?php echo $form->CheckBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

		<?php echo $form->textFieldRow($model,'logbuffer'); ?>
		<?php echo $form->error($model,'logbuffer'); ?>

		<?php echo $form->checkBoxRow($model,'authentication'); ?>
		<?php echo $form->error($model,'authentication'); ?>

		<?php echo $form->checkBoxRow($model,'debugevents'); ?>
		<?php echo $form->error($model,'debugevents'); ?>

		<?php echo $form->checkBoxRow($model,'debugdevices'); ?>
		<?php echo $form->error($model,'debugdevices'); ?>

		<?php echo $form->checkBoxRow($model,'debugenergy'); ?>
		<?php echo $form->error($model,'debugenergy'); ?>

		<?php echo $form->checkBoxRow($model,'autodevicecreate'); ?>
		<?php echo $form->error($model,'autodevicecreate'); ?>

		<?php echo $form->textFieldRow($model,'startpage'); ?>
		<?php echo $form->error($model,'startpage'); ?>

		<?php echo $form->textFieldRow($model,'logprefix'); ?>
		<?php echo $form->error($model,'logprefix'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
