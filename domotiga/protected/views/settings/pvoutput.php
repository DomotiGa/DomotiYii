<?php
/* @var $this SettingsPvoutputController */
/* @var $model SettingsPvoutput */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-pvoutput-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>PVoutput Settings</legend>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'api',array('class'=>'span7')); ?>
		<?php echo $form->numberFieldControlGroup($model,'pvoutputid'); ?>
		<?php echo $form->numberFieldControlGroup($model,'deviceid'); ?>
		<?php echo $form->numberFieldControlGroup($model,'devicevalue'); ?>
                <?php echo $form->dropDownListControlGroup($model,'devicevalue', array('0' => '', '1' => 'Value', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->numberFieldControlGroup($model,'usagedeviceid'); ?>
                <?php echo $form->dropDownListControlGroup($model,'usagedevicevalue', array('0' => '', '1' => 'Value', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->numberFieldControlGroup($model,'tempdeviceid'); ?>
                <?php echo $form->dropDownListControlGroup($model,'tempdevicevalue', array('0' => '', '1' => 'Value', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->numberFieldControlGroup($model,'pushtime'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
