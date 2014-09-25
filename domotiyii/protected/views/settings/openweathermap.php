<?php
/* @var $this SettingsOpenweathermapController */
/* @var $model SettingsOpenweathermap */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','OpenWeatherMap'),
    ),
)); ?>

<legend>OpenWeatherMap</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','OpenWeatherMap'), 'icon'=>'icon-globe', 'url'=>'http://openweathermap.org/', 'linkOptions'=>array('target'=>'_blank')),
                array('label'=>Yii::t('app','Register for API'), 'icon'=>'icon-globe', 'url'=>'http://openweathermap.org/register', 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-openweathermap-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
                <?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'apikey'); ?>
                <?php echo $form->textFieldControlGroup($model,'city'); ?>
                <?php echo $form->textFieldControlGroup($model,'cityid'); ?>
                <?php echo $form->numberFieldControlGroup($model,'polltime', array('append' => 'Seconds')); ?>
                <?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1, 'help'=>Yii::t('app','To get a free account/API key click \'Register for API\''))); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
