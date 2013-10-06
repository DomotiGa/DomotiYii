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

		<?php echo $form->textFieldControlGroup($model,'name'); ?>
		<?php echo $form->textFieldControlGroup($model,'firstname'); ?>
		<?php echo $form->textFieldControlGroup($model,'surname'); ?>
		<?php echo $form->textFieldControlGroup($model,'address'); ?>
		<?php echo $form->textFieldControlGroup($model,'zipcode'); ?>
		<?php echo $form->textFieldControlGroup($model,'city'); ?>
		<?php echo $form->textFieldControlGroup($model,'country'); ?>
		<?php echo $form->textFieldControlGroup($model,'phoneno'); ?>
		<?php echo $form->textFieldControlGroup($model,'mobileno'); ?>
		<?php echo $form->textFieldControlGroup($model,'callnr'); ?>
		<?php echo $form->textFieldControlGroup($model,'email'); ?>
		<?php echo $form->textFieldControlGroup($model,'cidphone'); ?>
		<?php echo $form->textFieldControlGroup($model,'cidmobile'); ?>
		<?php echo $form->textFieldControlGroup($model,'type'); ?>
		<?php echo $form->textFieldControlGroup($model,'birthday'); ?>

<div class="input-append">
<?php $this->widget(
    'yiiwheels.widgets.datepicker.WhDatePicker',
    array(
	'model' => $model,
        'name' => 'birthday',
        'attribute' => 'birthday',
	'pluginOptions' => array(
		'format'=>'yyyy-mm-dd',
	),
    )
);
?>
    <span class="add-on"><icon class="icon-calendar"></icon></span>
</div>
		<?php echo $form->checkBoxControlGroup($model,'holidaycard', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'firstseen',array('readonly'=>true)); ?>
		<?php echo $form->textFieldControlGroup($model,'lastseen',array('readonly'=>true)); ?>
		<?php echo $form->textFieldControlGroup($model,'comments',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
