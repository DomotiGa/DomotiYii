<?php
/* @var $this DeviceValuesController */
/* @var $model DeviceValues */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'devicevalues-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

	<?php echo $form->dropDownListControlGroup($model,'device_id', $model->getDevices(), array('prompt'=>'', 'id'=>'device_id')); ?>
        <?php echo $form->textFieldControlGroup($model,'valuenum'); ?>
        <?php echo $form->textFieldControlGroup($model,'value'); ?>
        <?php echo $form->dropDownListControlGroup($model,'units', array('°' => '°', '°C' => '°C', '°F' => '°F', '%' => '%', '€' => '€', '$' => '$', 'Amp' => 'Amp', 'Count' => 'Count', 'hPa' => 'hPa', 'Volt' => 'Volt', 'kWh' => 'kWh', 'kg' => 'kg', 'W' => 'W', 'Wh' => 'Wh', 'Watt' => 'Watt', 'W/m2' => 'W/m2', 'Level' => 'Level', 'lb' => 'lb', 'lux' => 'lux', 'RSSI' => 'RSSI', 'm/s' => 'm/s', 'mbar' => 'mbar', 'mm' => 'mm', 'mm/hr' => 'mm/hr', 'm3' => 'm3'), array('prompt'=>'')); ?>
        <?php echo $form->textFieldControlGroup($model,'valuerrddsname'); ?>
	<?php echo $form->dropDownListControlGroup($model,'valuerrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>
	<?php echo $form->textFieldControlGroup($model,'correction',array('class'=>'span5')); ?>
	<?php echo $form->checkBoxControlGroup($model,'log', array('value'=>-1)); ?>
	<?php echo $form->checkBoxControlGroup($model,'logdisplay', array('value'=>-1)); ?>
	<?php echo $form->checkBoxControlGroup($model,'logspeak', array('value'=>-1)); ?>
	<?php echo $form->checkBoxControlGroup($model,'rrd', array('value'=>-1)); ?>
	<?php echo $form->checkBoxControlGroup($model,'graph', array('value'=>-1)); ?>
        <?php echo $form->textFieldControlGroup($model,'lastchanged'); ?>
        <?php echo $form->textFieldControlGroup($model,'lastseen'); ?>
        <?php echo $form->textFieldControlGroup($model,'type'); ?>
	<?php echo $form->textFieldControlGroup($model,'description',array('class'=>'span5')); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
