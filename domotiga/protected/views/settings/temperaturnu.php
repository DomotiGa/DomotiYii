<?php
/* @var $this SettingsTemperaturnuController */
/* @var $model SettingsTemperaturnu */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>TemperaturNu Settings</legend>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'pushtime'); ?>
		<?php echo $form->textFieldControlGroup($model,'city'); ?>
		<?php echo $form->textFieldControlGroup($model,'apikey'); ?>
		<?php echo $form->numberFieldControlGroup($model,'deviceid'); ?>
		<?php echo $form->dropDownListControlGroup($model,'devicevalue', array('0' => '', '1' => 'Value', '2' => 'Value2', '3' => 'Value3', '4' => 'Value3')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
