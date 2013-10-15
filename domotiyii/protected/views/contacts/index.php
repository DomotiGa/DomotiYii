<?php
/* @var $this ContactsController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Contacts'),
    ),
));

$this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('translate','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
        ),
));
$this->endWidget();

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-contacts-grid',
    'refreshTime'=>Yii::app()->params['refreshContacts'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->getContacts(),
    'template'=>'{items}{pager}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'name', 'header'=>Yii::t('translate','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'address', 'header'=>Yii::t('translate','Street'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'zipcode', 'header'=>Yii::t('translate','PostalCode'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'city', 'header'=>Yii::t('translate','City'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'phoneno', 'header'=>Yii::t('translate','Phone no.'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'mobileno', 'header'=>Yii::t('translate','Mobile no.'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'email', 'header'=>Yii::t('translate','e-mail'), 'htmlOptions'=>array('width'=>'40')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view}{update}{delete}',
           'header'=>Yii::t('translate','Actions'),
           'htmlOptions'=>array('style'=>'width: 40px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('translate','View contact'),
                 'url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
              ),
              'update' => array(
                 'label'=>Yii::t('translate','Edit contact'),
                 'url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
              ),
              'delete' => array(
                 'label'=>Yii::t('translate','Delete contact'),
                 'url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
              ),
           ),
        ),
    ),
));

?>
