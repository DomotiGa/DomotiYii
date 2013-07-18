<?php
/* @var $this SettingsNta8130Controller */
/* @var $model SettingsNta8130 */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-nta8130-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>Smartmeter Settings</legend>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->dropDownListControlGroup($model,'type', array('serial' => 'serial', 'tcp' => 'tcp'), array('onchange'=>'switchTypeExtra(this);')); ?>
                <?php echo $form->textFieldControlGroup($model,'tcphost', array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcphost')); ?>
                <?php echo $form->numberFieldControlGroup($model,'tcpport', array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcpport')); ?>
                <?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5', 'readonly'=>($model->type == 'serial')? false : true, 'id'=>'serialport')); ?>
                <?php echo $form->dropDownListControlGroup($model,'baudrate', array('9600' => '9600', '19200' => '19200', '38400' => '38400', '57600' => '57600', '115200' => '115200'), array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'baudrate')); ?>
		<?php echo $form->numberFieldControlGroup($model,'databits', array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'databits')); ?>
		<?php echo $form->numberFieldControlGroup($model,'stopbits', array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'stopbits')); ?>
		<?php echo $form->numberFieldControlGroup($model,'parity', array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'parity')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
