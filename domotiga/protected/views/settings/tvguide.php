<?php
/* @var $this SettingsTvguideController */
/* @var $model SettingsTvguide */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-tvguide-tvguide-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Tvguide Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'xmlgrabcmd',array('class'=>'span7')); ?>
		<?php echo $form->error($model,'xmlgrabcmd'); ?>

		<?php echo $form->textFieldRow($model,'xmlfile',array('class'=>'span7')); ?>
		<?php echo $form->error($model,'xmlfile'); ?>

		<?php echo $form->checkboxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
