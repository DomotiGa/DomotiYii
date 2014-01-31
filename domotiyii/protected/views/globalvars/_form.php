<?php
/* @var $this GlobalvarsController */
/* @var $model Globalvars */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'globalvars-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->textFieldControlGroup($model,'var'); ?>
		<?php echo $form->textFieldControlGroup($model,'value', array('span'=>8)); ?>
                <?php echo $form->dropDownListControlGroup($model,'datatype', $model->getAllDataTypes(), array('prompt'=>'', 'id'=>'datatype')); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
