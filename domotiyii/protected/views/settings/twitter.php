<?php
/* @var $this SettingsTwitterController */
/* @var $model SettingsTwitter */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','Twitter'),
    ),
)); ?>

<legend>Twitter</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Send test Tweet'), 'icon'=>'icon-envelope', 'url'=>Yii::app()->controller->createUrl('sendtesttweet'),'active'=>false, 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Your Tweets'), 'icon'=>'icon-globe', 'url'=>'https://twitter.com/'.$model->username , 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-twitter-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'username'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password'); ?>
		<?php echo $form->checkBoxControlGroup($model,'sendtimestamp'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1, 'help'=>Yii::t('app','Note: Twitter module uses the bti cmmand line tool.'))); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
