<?php
/* @var $this SettingsCalleridController */
/* @var $model SettingsCallerid */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Modules') => '../index',
        Yii::t('translate','CallerID'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-callerid-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'countrycode'); ?>
		<?php echo $form->numberFieldControlGroup($model,'areacode'); ?>
		<?php echo $form->numberFieldControlGroup($model,'prefixnational'); ?>
		<?php echo $form->numberFieldControlGroup($model,'prefixinternational'); ?>
		<?php echo $form->checkBoxControlGroup($model,'autocreatecontacts', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>


<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('translate','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('translate','Reset')),
)); ?>
<?php $this->endWidget(); ?>
