<?php
/* @var $this ContactsController */
/* @var $model Contacts */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'contacts-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>... Settings</legend>

		<?php echo $form->textFieldControlGroup($model,'callnr'); ?>
		<?php echo $form->textFieldControlGroup($model,'type'); ?>
		<?php echo $form->textFieldControlGroup($model,'name'); ?>
		<?php echo $form->textFieldControlGroup($model,'address'); ?>
		<?php echo $form->textFieldControlGroup($model,'city'); ?>
		<?php echo $form->textFieldControlGroup($model,'country'); ?>
		<?php echo $form->textFieldControlGroup($model,'phoneno'); ?>
		<?php echo $form->textFieldControlGroup($model,'mobileno'); ?>
		<?php echo $form->textFieldControlGroup($model,'email'); ?>
		<?php echo $form->textFieldControlGroup($model,'cidphone'); ?>
		<?php echo $form->textFieldControlGroup($model,'cidmobile'); ?>
		<?php echo $form->textFieldControlGroup($model,'firstname'); ?>
		<?php echo $form->textFieldControlGroup($model,'surname'); ?>
		<?php echo $form->textFieldControlGroup($model,'zipcode'); ?>
		<?php echo $form->textFieldControlGroup($model,'birthday'); ?>
		<?php echo $form->textFieldControlGroup($model,'holidaycard'); ?>
		<?php echo $form->textFieldControlGroup($model,'comments'); ?>
		<?php echo $form->textFieldControlGroup($model,'firstseen'); ?>
		<?php echo $form->textFieldControlGroup($model,'lastseen'); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
