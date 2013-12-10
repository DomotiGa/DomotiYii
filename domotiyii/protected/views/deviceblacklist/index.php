<?php
/* @var $this DeviceblacklistController */
/* @var $model Deviceblacklist */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'deviceblacklist-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>

		<?php echo $form->textFieldControlGroup($model,'id'); ?>
		<?php echo $form->textFieldControlGroup($model,'address'); ?>
		<?php echo $form->textFieldControlGroup($model,'comments'); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
