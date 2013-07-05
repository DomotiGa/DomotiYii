<?php
/* @var $this SettingsAstroController */
/* @var $model SettingsAstro */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-astro-astro-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Astro and Location Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'timezone'); ?>
		<?php echo $form->error($model,'timezone'); ?>

		<?php echo $form->checkBoxRow($model,'dst'); ?>
		<?php echo $form->error($model,'dst'); ?>

		<?php echo $form->textFieldRow($model,'latitude'); ?>
		<?php echo $form->error($model,'latitude'); ?>

		<?php echo $form->textFieldRow($model,'longitude'); ?>
		<?php echo $form->error($model,'longitude'); ?>

		<?php echo $form->dropDownListRow($model,'twilight', array('nautical' => 'nautical', 'civil' => 'civil', 'astronomical' => 'astronomical')); ?>
		<?php echo $form->error($model,'twilight'); ?>

		<?php echo $form->textFieldRow($model,'seasons'); ?>
		<?php echo $form->error($model,'seasons'); ?>

		<?php echo $form->textFieldRow($model,'seasonstarts'); ?>
		<?php echo $form->error($model,'seasonstarts'); ?>

		<?php echo $form->dropDownListRow($model,'temperature', array('°C' => '°C', '°F' => '°F')); ?>
		<?php echo $form->error($model,'temperature'); ?>

		<?php echo $form->dropDownListRow($model,'currency', array('€' => '€', '$' => '$')); ?>
		<?php echo $form->error($model,'currency'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
