<?php
/* @var $this DevicesbwiredController */
/* @var $model DevicesBwired */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'devicesbwired-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

		<?php echo $form->dropDownListControlGroup($model,'deviceid',Devices::getDevices(), array('prompt'=>'', 'id'=>'deviceid')); ?>
		<?php echo $form->textFieldControlGroup($model,'devicename'); ?>
		<?php echo $form->dropDownListControlGroup($model,'value', array('0' => '', '1' => 'Value1', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->textFieldControlGroup($model,'devicelabel'); ?>
		<?php echo $form->textFieldControlGroup($model,'description'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
