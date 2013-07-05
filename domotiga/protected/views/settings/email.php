<?php
/* @var $this SettingsEmailController */
/* @var $model SettingsEmail */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-email-email-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>E-mail Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'smtpserver'); ?>
		<?php echo $form->error($model,'smtpserver'); ?>

		<?php echo $form->textFieldRow($model,'smtpport'); ?>
		<?php echo $form->error($model,'smtpport'); ?>

		<?php echo $form->textFieldRow($model,'fromaddress'); ?>
		<?php echo $form->error($model,'fromaddress'); ?>

		<?php echo $form->textFieldRow($model,'toaddress'); ?>
		<?php echo $form->error($model,'toaddress'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
