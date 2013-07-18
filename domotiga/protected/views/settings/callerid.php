<?php
/* @var $this SettingsCalleridController */
/* @var $model SettingsCallerid */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-callerid-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>CallerID Settings</legend>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'countrycode'); ?>
		<?php echo $form->numberFieldControlGroup($model,'areacode'); ?>
		<?php echo $form->numberFieldControlGroup($model,'prefixnational'); ?>
		<?php echo $form->numberFieldControlGroup($model,'prefixinternational'); ?>
		<?php echo $form->checkBoxControlGroup($model,'autocreatecontacts', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
