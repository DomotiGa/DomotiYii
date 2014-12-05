<?php
/* @var $this SettingsIpx800Controller */
/* @var $model SettingsIpx800 */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Plugins') => 'indexPlugins',
        Yii::t('app','IPX800'),
    ),
)); ?>

<legend>IPX800</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Your IPX800 Module'), 'icon'=>'icon-globe', 'url'=>'http://'.$model->tcphost, 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();


$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-ipx800-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
                <?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'tcphost'); ?>
		<?php echo $form->numberFieldControlGroup($model,'tcpport'); ?>
		<?php echo $form->textFieldControlGroup($model,'username'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password'); ?>
		<?php echo $form->textFieldControlGroup($model,'poll', array('append' => 'Seconds')); ?>
                <?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
