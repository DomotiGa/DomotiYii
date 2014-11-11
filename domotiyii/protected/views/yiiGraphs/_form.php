<?php
/* @var $this YiiGraphsController */
/* @var $model YiiGraphs */
/* @var $form CActiveForm */

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'yii-graphs-form',
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note">Fields with <span class="required">*</span> are required.<br/>
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