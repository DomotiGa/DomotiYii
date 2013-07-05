<?php
/* @var $this SettingsSmartvisuController */
/* @var $model SettingsSmartvisu */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-smartvisu-smartvisu-form',
        'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Smartvisuserver Settings</legend>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->checkBoxRow($model,'enabled'); ?>
	<?php echo $form->error($model,'enabled'); ?>

	<?php echo $form->textFieldRow($model,'tcpport'); ?>
	<?php echo $form->error($model,'tcpport'); ?>

	<?php echo $form->checkBoxRow($model,'debug'); ?>
	<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
