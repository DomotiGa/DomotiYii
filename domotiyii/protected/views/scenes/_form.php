<?php
/* @var $this ScenesController */
/* @var $model Scenes */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'scenes-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'name'); ?>
		<?php echo $form->textFieldControlGroup($model,'firstrun'); ?>
		<?php echo $form->textFieldControlGroup($model,'lastrun'); ?>
		<?php echo $form->checkBoxControlGroup($model,'log', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'comments'); ?>
        <?php echo $form->dropDownListControlGroup($model,'location_id', $model->getLocations(),array('id'=>'location_id')); ?>
        <?php echo $form->dropDownListControlGroup($model,'event_id', $model->getEvents(),array('id'=>'event_id')); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
