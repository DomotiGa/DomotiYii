<?php
/* @var $this DeviceValuesController */
/* @var $model DeviceValues */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'devicevalues-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

        <?php echo $form->textFieldControlGroup($model,'device_id'); ?>
        <?php echo $form->textFieldControlGroup($model,'valuenum'); ?>
        <?php echo $form->textFieldControlGroup($model,'units'); ?>
        <?php echo $form->textFieldControlGroup($model,'valuerrddsname'); ?>
        <?php echo $form->textFieldControlGroup($model,'valuerrdtype'); ?>
        <?php echo $form->textFieldControlGroup($model,'value'); ?>
        <?php echo $form->textFieldControlGroup($model,'correction'); ?>
        <?php echo $form->textFieldControlGroup($model,'log'); ?>
        <?php echo $form->textFieldControlGroup($model,'logdisplay'); ?>
        <?php echo $form->textFieldControlGroup($model,'logspeak'); ?>
        <?php echo $form->textFieldControlGroup($model,'rrd'); ?>
        <?php echo $form->textFieldControlGroup($model,'graph'); ?>
        <?php echo $form->textFieldControlGroup($model,'lastchanged'); ?>
        <?php echo $form->textFieldControlGroup($model,'lastseen'); ?>
        <?php echo $form->textFieldControlGroup($model,'type'); ?>
        <?php echo $form->textFieldControlGroup($model,'description'); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
