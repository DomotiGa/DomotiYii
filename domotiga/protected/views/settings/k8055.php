<?php
/* @var $this SettingsK8055Controller */
/* @var $model SettingsK8055 */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-k8055-k8055-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>K8055 Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'polltime'); ?>
		<?php echo $form->error($model,'polltime'); ?>

		<?php echo $form->textFieldRow($model,'boardaddress'); ?>
		<?php echo $form->error($model,'boardaddress'); ?>

		<?php echo $form->textFieldRow($model,'debouncetime1'); ?>
		<?php echo $form->error($model,'debouncetime1'); ?>

		<?php echo $form->textFieldRow($model,'debouncetime2'); ?>
		<?php echo $form->error($model,'debouncetime2'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
