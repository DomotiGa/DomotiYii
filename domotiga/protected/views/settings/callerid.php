<?php
/* @var $this SettingsCalleridController */
/* @var $model SettingsCallerid */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-callerid-callerid-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>CallerID Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'countrycode'); ?>
		<?php echo $form->error($model,'countrycode'); ?>

		<?php echo $form->textFieldRow($model,'areacode'); ?>
		<?php echo $form->error($model,'areacode'); ?>

		<?php echo $form->textFieldRow($model,'prefixnational'); ?>
		<?php echo $form->error($model,'prefixnational'); ?>

		<?php echo $form->textFieldRow($model,'prefixinternational'); ?>
		<?php echo $form->error($model,'prefixinternational'); ?>

		<?php echo $form->checkBoxRow($model,'autocreatecontacts'); ?>
		<?php echo $form->error($model,'autocreatecontacts'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
