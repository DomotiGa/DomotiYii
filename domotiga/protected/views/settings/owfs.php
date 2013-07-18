<?php
/* @var $this SettingsOwfsController */
/* @var $model SettingsOwfs */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-owfs-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>OWFS Settings</legend>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'basedir'); ?>
		<?php echo $form->numberFieldControlGroup($model,'polltime'); ?>
		<?php echo $form->checkBoxControlGroup($model,'cached', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
