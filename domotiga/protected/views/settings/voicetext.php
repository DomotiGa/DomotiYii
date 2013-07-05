<?php
/* @var $this SettingsVoicetextController */
/* @var $model SettingsVoicetext */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-voicetext-voicetext-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>VoiceText Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'engine'); ?>
		<?php echo $form->error($model,'engine'); ?>

		<?php echo $form->textFieldRow($model,'prefixcmd'); ?>
		<?php echo $form->error($model,'prefixcmd'); ?>

		<?php echo $form->textFieldRow($model,'voicesmale'); ?>
		<?php echo $form->error($model,'voicesmale'); ?>

		<?php echo $form->textFieldRow($model,'voicesfemale'); ?>
		<?php echo $form->error($model,'voicesfemale'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
