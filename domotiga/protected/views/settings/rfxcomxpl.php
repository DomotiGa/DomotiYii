<?php
/* @var $this SettingsRfxcomxplController */
/* @var $model SettingsRfxcomxpl */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-rfxcomxpl-rfxcomxpl-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>RFXComxPL Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'rxaddress'); ?>
		<?php echo $form->error($model,'rxaddress'); ?>

		<?php echo $form->textFieldRow($model,'txaddress'); ?>
		<?php echo $form->error($model,'txaddress'); ?>

		<?php echo $form->checkBoxRow($model,'oldaddrfmt'); ?>
		<?php echo $form->error($model,'oldaddrfmt'); ?>

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
