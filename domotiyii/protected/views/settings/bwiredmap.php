<?php
/* @var $this SettingsBwiredmapController */
/* @var $model SettingsBwiredmap */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','BwiredMap'),
    ),
)); ?>

<legend>BwiredMap</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Settings'), 'icon'=>'icon-wrench', 'url'=>Yii::app()->controller->createUrl('bwiredmap'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Devices'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('devicesbwired/index'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Bwired\'s DomoticaWorld'), 'icon'=>'icon-globe', 'url'=>'http://www.bwired.nl/domoticaworld.asp', 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'pushtime', array('append' => 'Seconds')); ?>
		<?php echo $form->textFieldControlGroup($model,'website'); ?>
		<?php echo $form->textFieldControlGroup($model,'websitepicurl',array('class'=>'span7')); ?>
		<?php echo $form->textFieldControlGroup($model,'title'); ?>
		<?php echo $form->textFieldControlGroup($model,'city'); ?>
		<?php echo $form->textFieldControlGroup($model,'user'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password'); ?>
		<?php echo $form->textFieldControlGroup($model,'screenname'); ?>
		<?php echo $form->textFieldControlGroup($model,'gpslat'); ?>
		<?php echo $form->textFieldControlGroup($model,'gpslong'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
