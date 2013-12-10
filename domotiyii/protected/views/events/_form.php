<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'events-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
));

$this->widget('bootstrap.widgets.TbTabs', array(
    'id' => 'mytabs',
    'type' => 'tabs',
    'tabs' => array(
            array('id' => 'main', 'label' => Yii::t('app','Main'), 'content' => $this->renderPartial('edit/_main', array('form' => $form, 'model' => $model), true), 'active' => true),
            array('id' => 'trigger', 'label' => Yii::t('app','Trigger'), 'content' => $this->renderPartial('edit/_trigger', array('form' => $form, 'model' => $model) , true)),
	    array('id' => 'conditions', 'label' => Yii::t('app','Conditions'), 'content' => $this->renderPartial('edit/_conditions', array('form' => $form, 'model' => $model) , true)),
            array('id' => 'actions', 'label' => Yii::t('app','Actions'), 'content' => $this->renderPartial('edit/_actions', array('form' => $form, 'model' => $model) , true)),
            array('id' => 'options', 'label' => Yii::t('app','Options'), 'content' => $this->renderPartial('edit/_options', array('form' => $form, 'model' => $model) , true)),
    ),
));

echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
