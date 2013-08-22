<?php
/* @var $this SettingsPvoutputController */
/* @var $model SettingsPvoutput */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Modules') => '../index',
        Yii::t('translate','PVoutput'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-pvoutput-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'api',array('class'=>'span7')); ?>
		<?php echo $form->numberFieldControlGroup($model,'pvoutputid'); ?>
		<?php echo $form->numberFieldControlGroup($model,'deviceid'); ?>
		<?php echo $form->numberFieldControlGroup($model,'devicevalue'); ?>
                <?php echo $form->dropDownListControlGroup($model,'devicevalue', array('0' => '', '1' => 'Value', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->numberFieldControlGroup($model,'usagedeviceid'); ?>
                <?php echo $form->dropDownListControlGroup($model,'usagedevicevalue', array('0' => '', '1' => 'Value', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->numberFieldControlGroup($model,'tempdeviceid'); ?>
                <?php echo $form->dropDownListControlGroup($model,'tempdevicevalue', array('0' => '', '1' => 'Value', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->numberFieldControlGroup($model,'pushtime', array('append' => 'Seconds')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('translate','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('translate','Reset')),
)); ?>
<?php $this->endWidget(); ?>
