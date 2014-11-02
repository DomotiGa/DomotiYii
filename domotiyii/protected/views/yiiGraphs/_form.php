<?php
/* @var $this YiiGraphsController */
/* @var $model YiiGraphs */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'yii-graphs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>false,
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note">Fields with <span class="required">*</span> are required.<br/>
<?php echo Yii::t('app','Connect the graph to a device value.')?><br/>
<?php echo Yii::t('app','It is mandatory to enable the log option on a device value!') ?><br/>
<?php echo Yii::t('app','It is mandatory to set a unit on a device value!') ?>
</p>

	<?php echo $form->errorSummary($model); ?>
		<?php echo $form->checkBoxControlGroup($model,'enabled',array('value'=>-1, 'selected'=>$model->isNewRecord )); ?>
		<?php echo $form->textFieldControlGroup($model,'name'); ?>
		<?php echo $form->dropDownListControlGroup($model,'type', $model->getChartTypes(),array('id'=>'name')); ?>
		<?php echo $form->textFieldControlGroup($model,'description'); ?>
		<?php echo $form->dropDownListControlGroup($model,'device_value_01', $model->getDeviceValues(),array('id'=>'name')); ?>
		
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'group'); ?>
		<?php echo $form->textField($model,'group',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'group'); ?>
	</div>
-->

<!--
	<div class="row">
		<?php echo $form->dropDownListControlGroup($model,'device_value_02', $model->getDeviceValues(),array('id'=>'name')); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownListControlGroup($model,'device_value_03', $model->getDeviceValues(),array('id'=>'name')); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownListControlGroup($model,'device_value_04', $model->getDeviceValues(),array('id'=>'name')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'graph_width'); ?>
		<?php echo $form->textField($model,'graph_width'); ?>
		<?php echo $form->error($model,'graph_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'graph_height'); ?>
		<?php echo $form->textField($model,'graph_height'); ?>
		<?php echo $form->error($model,'graph_height'); ?>
	</div>
-->

</fieldset>
<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->