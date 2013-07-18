<?php
/* @var $this SettingsBwiredmapController */
/* @var $model SettingsBwiredmap */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>BwiredMap Settings</legend>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'pushtime'); ?>
		<?php echo $form->textFieldControlGroup($model,'website'); ?>
		<?php echo $form->textFieldControlGroup($model,'websitepicurl',array('class'=>'span7')); ?>
		<?php echo $form->textFieldControlGroup($model,'title'); ?>
		<?php echo $form->textFieldControlGroup($model,'city'); ?>
		<?php echo $form->textFieldControlGroup($model,'user'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password'); ?>
		<?php echo $form->textFieldControlGroup($model,'screenname'); ?>
		<?php echo $form->textFieldControlGroup($model,'gpslat'); ?>
		<?php echo $form->textFieldControlGroup($model,'gpslong'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
