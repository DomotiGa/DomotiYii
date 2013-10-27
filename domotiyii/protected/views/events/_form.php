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
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'name'); ?>
		<?php echo $form->dropDownListControlGroup($model,'trigger1', $model->getAllTriggers(), array('prompt'=>'', 'id'=>'trigger1')); ?>
		<?php echo $form->dropDownListControlGroup($model,'condition1', $model->getAllConditions(), array('prompt'=>'', 'id'=>'condition1')); ?>
		<?php echo $form->textFieldControlGroup($model,'operand'); ?>
		<?php echo $form->dropDownListControlGroup($model,'condition2', $model->getAllConditions(), array('prompt'=>'', 'id'=>'condition2')); ?>
		<?php echo $form->dropDownListControlGroup($model,'action1', $model->getAllActions(), array('prompt'=>'', 'id'=>'action1')); ?>
		<?php echo $form->dropDownListControlGroup($model,'action2', $model->getAllActions(), array('prompt'=>'', 'id'=>'action2')); ?>
		<?php echo $form->dropDownListControlGroup($model,'action3', $model->getAllActions(), array('prompt'=>'', 'id'=>'action3')); ?>
		<?php echo $form->dropDownListControlGroup($model,'category', $model->getAllCategories(), array('prompt'=>'', 'id'=>'category')); ?>
		<?php echo $form->checkBoxControlGroup($model,'rerunenabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'reruntype'); ?>
		<?php echo $form->textFieldControlGroup($model,'rerunvalue'); ?>
		<?php echo $form->textFieldControlGroup($model,'firstrun'); ?>
		<?php echo $form->textFieldControlGroup($model,'lastrun'); ?>
		<?php echo $form->checkBoxControlGroup($model,'log', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'comments'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
