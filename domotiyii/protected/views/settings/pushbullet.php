<?php
/* @var $this SettingsPushbulletController */
/* @var $model SettingsPushbullet */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','Pushbullet'),
    ),
)); ?>

<legend>Pushbullet</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                 array('label'=>Yii::t('app','Send test PushMsg'), 'icon'=>'icon-envelope', 'url'=>Yii::app()->controller->createUrl('sendtestpushbullet'),'active'=>false, 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Pushbullet'), 'icon'=>'icon-globe', 'url'=>'https://pushbullet.com', 'linkOptions'=>array('target'=>'_blank')),
                array('label'=>Yii::t('app','Register'), 'icon'=>'icon-globe', 'url'=>'https://pushbullet.com', 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-pushbullet-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
                <?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'token', array('class'=>'span4')); ?>
                <?php echo $form->textFieldControlGroup($model,'device'); ?>
                <?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1, 'help'=>Yii::t('app','Note: To get a free account/API key click \'Register\' and login.'))); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
