<?php
/* @var $this DevicesController */
/* @var $model Devices */
/* @var $form CActiveForm */

//to switch directly to the right tab
$activeTab=Yii::app()->request->getParam('activeTab');

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'edit-devices-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
));

$this->widget('bootstrap.widgets.TbTabs', array(
    'id' => 'mytabs',
    'type' => 'tabs',
    'tabs' => array(
            array('id' => 'general', 'label' => Yii::t('app','Main'), 'content' => $this->renderPartial('edit/_general', array('form' => $form, 'model' => $model), true), 'active' => ($activeTab==NULL?true:false)),
            array('id' => 'values', 'label' => Yii::t('app','Values'), 'content' => $this->renderPartial('edit/_values', array('form' => $form, 'model' => $model), true), 'active' => ($activeTab=='values'?true:false)),
            array('id' => 'icons', 'label' => Yii::t('app','Icons'), 'content' => $this->renderPartial('edit/_icons', array('form' => $form, 'model' => $model) , true)),
            array('id' => 'location', 'label' => Yii::t('app','Location'), 'content' => $this->renderPartial('edit/_location', array('form' => $form, 'model' => $model) , true)),
            array('id' => 'options', 'label' => Yii::t('app','Options'), 'content' => $this->renderPartial('edit/_options', array('form' => $form, 'model' => $model) , true)),
    ),
));

echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>

<?php
Yii::app()->clientScript->registerScript('bettertobedone', "
//i dont know how to change the css for 
        $('.tab-content').css('overflow','visible');
", CClientScript::POS_READY);
?>