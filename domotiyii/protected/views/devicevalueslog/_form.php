<?php
/* @var $this DeviceValuesLogController */
/* @var $model DeviceValuesLog */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'devicevalueslog-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

        <?php echo $form->textFieldControlGroup($model,'device_id'); ?>
        <?php echo $form->textFieldControlGroup($model,'valuenum'); ?>
        <?php echo $form->textFieldControlGroup($model,'value'); ?>
        <?php echo $form->textFieldControlGroup($model,'lastchanged'); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
