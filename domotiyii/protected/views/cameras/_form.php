<?php
/* @var $this CamerasController */
/* @var $model Cameras */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'cameras-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

		<?php echo $form->checkBoxControlGroup($model,'enabled',array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'name'); ?>
		<?php echo $form->textFieldControlGroup($model,'description',array('class'=>'span7')); ?>
		<?php echo $form->dropDownListControlGroup($model,'type', $model->getAllCameraTypes(), array('prompt'=>'', 'id'=>'type')); ?>
		<?php echo $form->textFieldControlGroup($model,'cmdoptions',array('class'=>'span7')); ?>
		<?php echo $form->textFieldControlGroup($model,'viewstring',array('class'=>'span7')); ?>
		<?php echo $form->textFieldControlGroup($model,'grabstring',array('class'=>'span7')); ?>
		<?php echo $form->dropDownListControlGroup($model,'ptztype', $model->getAllCameraPTZTypes(), array('prompt'=>'', 'id'=>'ptztype')); ?>
		<?php echo $form->textFieldControlGroup($model,'ptzbaseurl',array('class'=>'span7')); ?>
		<?php echo $form->numberFieldControlGroup($model,'viscaaddress', array('readonly'=>($model->ptztype == "Sony VISCA")? false : true, 'id'=>'viscaaddress')); ?>
		<?php echo $form->textFieldControlGroup($model,'username'); ?>
		<?php echo $form->textFieldControlGroup($model,'passwd'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
