<?php
/* @var $this SettingsRfxcomxplController */
/* @var $model SettingsRfxcomxpl */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-rfxcomxpl-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>RFXComxPL Settings</legend>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'rxaddress'); ?>
		<?php echo $form->textFieldControlGroup($model,'txaddress'); ?>
		<?php echo $form->checkBoxControlGroup($model,'oldaddrfmt', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'globalx10', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
