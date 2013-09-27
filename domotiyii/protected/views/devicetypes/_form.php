<?php
/* @var $this DevicetypesController */
/* @var $model Devicetypes */
/* @var $form TbActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'devicetypes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>32)); ?>

	<?php echo $form->textFieldControlGroup($model,'description',array('span'=>5,'maxlength'=>32)); ?>

	<?php echo $form->textFieldControlGroup($model,'type',array('span'=>5,'maxlength'=>32)); ?>

	<?php echo $form->textFieldControlGroup($model,'addressformat',array('span'=>5,'maxlength'=>128)); ?>

	<?php echo $form->textFieldControlGroup($model,'onicon',array('span'=>5,'maxlength'=>32)); ?>

	<?php echo $form->textFieldControlGroup($model,'officon',array('span'=>5,'maxlength'=>32)); ?>

	<?php echo $form->textFieldControlGroup($model,'dimicon',array('span'=>5,'maxlength'=>32)); ?>

	<?php echo $form->checkBoxControlGroup($model,'switchable'); ?>

	<?php echo $form->checkBoxControlGroup($model,'dimable'); ?>

	<?php echo $form->checkBoxControlGroup($model,'extcode'); ?>

	<?php echo $form->textFieldControlGroup($model,'label',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'label2',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'label3',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'label4',array('span'=>5)); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->