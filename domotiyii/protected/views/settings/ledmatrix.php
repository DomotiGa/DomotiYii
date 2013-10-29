<?php
/* @var $this SettingsLedmatrixController */
/* @var $model SettingsLedmatrix */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Interfaces') => '../index',
        Yii::t('app','LED Matrix'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-ledmatrix-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>LEDMatrix</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'displayid'); ?>
		<?php echo $form->dropDownListControlGroup($model,'color', array('0' => 'Dim Red', '1' => 'Red', '2' => 'Bright Red', '3' => 'Dim Green', '4' => 'Green', '5' => 'Bright Green', '6' => 'Dim Orange', '7' => 'Orange', '8' => 'Bright Orange', '9' => 'Yellow', '10' => 'Lime', '11' => 'Inversed Red', '12' => 'Inversed Orange', '13' => 'Red on Green Dim', '14' => 'Green on Red Dim', '15' => 'R/Y/G', '16' => 'Rainbow')); ?>
                <?php echo $form->dropDownListControlGroup($model,'speed', array('0' => '25%', '1' => '50%', '2' => '75%', '3' => '100%')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
