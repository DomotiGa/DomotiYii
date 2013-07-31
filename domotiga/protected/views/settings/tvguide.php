<?php
/* @var $this SettingsTvguideController */
/* @var $model SettingsTvguide */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Settings') => '../index',
        Yii::t('translate','TVGuide'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-tvguide-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'xmlgrabcmd', array('class'=>'span7')); ?>
		<?php echo $form->textFieldControlGroup($model,'xmlfile', array('class'=>'span7')); ?>
		<?php echo $form->checkboxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('translate','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('translate','Reset')),
)); ?>
<?php $this->endWidget(); ?>
