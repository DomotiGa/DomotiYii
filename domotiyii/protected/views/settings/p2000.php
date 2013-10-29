<?php
/* @var $this SettingsP2000Controller */
/* @var $model SettingsP0000 */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => '../index',
        Yii::t('app','P2000'),
    ),
)); ?>

<legend>P2000 Scanner</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','P2000 Live'), 'icon'=>'icon-globe', 'url'=>'http://monitor.livep2000.nl/', 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-p2000-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'regios', array('class'=>'span4')); ?>
		<?php echo $form->textFieldControlGroup($model,'discipline', array('class'=>'span4')); ?>
                <?php echo $form->numberFieldControlGroup($model,'messages', array('append' => 'Msgs')); ?>
		<?php echo $form->textFieldControlGroup($model,'filter'); ?>
		<?php echo $form->textFieldControlGroup($model,'georange'); ?>
		<?php echo $form->checkBoxControlGroup($model,'fetchimage', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'maplink', array('value'=>-1)); ?>
                <?php echo $form->numberFieldControlGroup($model,'polltime', array('append' => 'Seconds')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
