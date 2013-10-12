<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'events-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'name'); ?>
		<?php echo $form->textFieldControlGroup($model,'trigger1'); ?>
		<?php echo $form->textFieldControlGroup($model,'condition1'); ?>
		<?php echo $form->textFieldControlGroup($model,'operand'); ?>
		<?php echo $form->textFieldControlGroup($model,'condition2'); ?>
		<?php echo $form->textFieldControlGroup($model,'action1'); ?>
		<?php echo $form->textFieldControlGroup($model,'action2'); ?>
		<?php echo $form->textFieldControlGroup($model,'action3'); ?>
		<?php echo $form->textFieldControlGroup($model,'category'); ?>
		<?php echo $form->checkBoxControlGroup($model,'rerunenabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'reruntype'); ?>
		<?php echo $form->textFieldControlGroup($model,'rerunvalue'); ?>
		<?php echo $form->textFieldControlGroup($model,'firstrun'); ?>
		<?php echo $form->textFieldControlGroup($model,'lastrun'); ?>
		<?php echo $form->checkBoxControlGroup($model,'log', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'comments'); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
