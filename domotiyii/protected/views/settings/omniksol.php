<?php
/* @var $this SettingsOmniksolController */
/* @var $model SettingsOmniksol */
/* @var $form CActiveForm */
$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Plugins') => 'indexPlugins',
        Yii::t('app','Omniksol'),
    ),
)); ?>

<legend>Omniksol</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Your Omniksol Inverter'), 'icon'=>'icon-globe', 'url'=>'http://'.$model->tcphost, 'linkOptions'=>array('target'=>'_blank')),
                array('label'=>Yii::t('app','OmnikSolar Portal'), 'icon'=>'icon-globe', 'url'=>'http://www.omnikportal.com/', 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-omniksol-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
                <?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>

		<?php echo $form->textFieldControlGroup($model,'tcpport'); ?>
		<?php echo $form->textFieldControlGroup($model,'tcphost'); ?>
		<?php echo $form->textFieldControlGroup($model,'serial'); ?>
		<?php echo $form->textFieldControlGroup($model,'cron'); ?>
                <?php echo $form->checkBoxControlGroup($model,'discover', array('value'=>-1)); ?>
                <?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
