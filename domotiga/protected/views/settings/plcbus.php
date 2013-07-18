<?php
/* @var $this SettingsPlcbusController */
/* @var $model SettingsPlcbus */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-plcbus-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>PLCBUS Settings</legend>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5')); ?>
                <?php echo $form->dropDownListControlGroup($model,'baudrate', array('9600' => '9600', '19200' => '19200', '38400' => '38400', '57600' => '57600', '115200' => '115200')); ?>
		<?php echo $form->textFieldControlGroup($model,'housecodes'); ?>
		<?php echo $form->numberFieldControlGroup($model,'usercode'); ?>
		<?php echo $form->numberFieldControlGroup($model,'polltime'); ?>
		<?php echo $form->checkBoxControlGroup($model,'threephase', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'ack', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
