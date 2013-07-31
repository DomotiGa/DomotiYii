<?php
/* @var $this DevicetypesController */
/* @var $model Devicetypes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>20)); ?>

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
		<?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->