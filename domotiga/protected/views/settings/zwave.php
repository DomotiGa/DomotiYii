<?php
/* @var $this SettingsZwaveController */
/* @var $model SettingsZwave */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-zwave-zwave-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Zwave Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'serialport'); ?>
		<?php echo $form->error($model,'serialport'); ?>

		<?php echo $form->textFieldRow($model,'baudrate'); ?>
		<?php echo $form->error($model,'baudrate'); ?>

		<?php echo $form->checkBoxRow($model,'useozw'); ?>
		<?php echo $form->error($model,'useozw'); ?>

		<?php echo $form->textFieldRow($model,'polltime'); ?>
		<?php echo $form->error($model,'polltime'); ?>


		<?php echo $form->checkBoxRow($model,'enablepollsleeping'); ?>
		<?php echo $form->error($model,'enablepollsleeping'); ?>

		<?php echo $form->textFieldRow($model,'polltimesleeping'); ?>
		<?php echo $form->error($model,'polltimesleeping'); ?>

		<?php echo $form->checkBoxRow($model,'enablepolllistening'); ?>
		<?php echo $form->error($model,'enablepolllistening'); ?>

		<?php echo $form->textFieldRow($model,'polltimelistening'); ?>
		<?php echo $form->error($model,'polltimelistening'); ?>

		<?php echo $form->checkBoxRow($model,'enableupdateneighbor'); ?>
		<?php echo $form->error($model,'enableupdateneighbor'); ?>

		<?php echo $form->checkBoxRow($model,'reloadnodes'); ?>
		<?php echo $form->error($model,'reloadnodes'); ?>

		<?php echo $form->checkBoxRow($model,'updateneighbor'); ?>
		<?php echo $form->error($model,'updateneighbor'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
