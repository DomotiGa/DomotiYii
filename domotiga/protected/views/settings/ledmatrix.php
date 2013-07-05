<?php
/* @var $this SettingsLedmatrixController */
/* @var $model SettingsLedmatrix */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-ledmatrix-ledmatrix-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>Ledmatrix Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'serialport'); ?>
		<?php echo $form->error($model,'serialport'); ?>

		<?php echo $form->textFieldRow($model,'displayid'); ?>
		<?php echo $form->error($model,'displayid'); ?>

		<?php echo $form->dropDownListRow($model,'color', array('0' => 'Dim Red', '1' => 'Red', '2' => 'Bright Red', '3' => 'Dim Green', '4' => 'Green', '5' => 'Bright Green', '6' => 'Dim Orange', '7' => 'Orange', '8' => 'Bright Orange', '9' => 'Yellow', '10' => 'Lime', '11' => 'Inversed Red', '12' => 'Inversed Orange', '13' => 'Red on Green Dim', '14' => 'Green on Red Dim', '15' => 'R/Y/G', '16' => 'Rainbow')); ?>
		<?php echo $form->error($model,'color'); ?>

                <?php echo $form->dropDownListRow($model,'speed', array('0' => '25%', '1' => '50%', '2' => '75%', '3' => '100%')); ?>
		<?php echo $form->error($model,'speed'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
