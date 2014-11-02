<?php
/* @var $this YiiGraphsController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Yii Graphs'),
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
                array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
        ),
));
$this->endWidget();
?>
<p>
<b><?php echo Yii::t('app','Supported graph types:') ?></b><br>
<b><?php echo Yii::t('app','Barchart :') ?></b> <?php echo Yii::t('app','Displays a graph (only bars) when values of the device are logged. It shows a count of the values over time.') ?><br>
<b><?php echo Yii::t('app','Gauge :') ?></b> <?php echo Yii::t('app','Displays a gauge when values of the device are logged. It shows the last logged value.') ?> <br>
<b><?php echo Yii::t('app','Linechart :') ?></b> <?php echo Yii::t('app','Displays a line graph when values of the device are logged. It shows all logged values over time.') ?>  <br><br>
<?php echo Yii::t('app','The graphs below are only available in Domotiyii.') ?><br/>
<?php echo Yii::t('app','It is mandatory to enable the log option on a device value!') ?><br/>
<?php echo Yii::t('app','It is mandatory to set a unit on a device value!') ?>
<br/>
</p>
<?php
$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-cameras-grid',
    'refreshTime'=>Yii::app()->params['refreshCameras'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$dataProvider,
    'template'=>'{items}{pager}{summary}',
    'selectableRows' => 1,
    'columns'=>array(
        array('name'=>'enabled', 
            'header'=>Yii::t('app','Enabled'),
            'value'=>'($data->enabled==-1?"<span class=\"icon-ok\"></span>":"")',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'15')),
        //array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'name', 'header'=>Yii::t('app','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'description', 'header'=>Yii::t('app','Description'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'type', 'header'=>Yii::t('app','Type'), 'htmlOptions'=>array('width'=>'20')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
           'header'=>Yii::t('app','Actions'),
           'htmlOptions'=>array('style'=>'width: 50px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('app','View'),
                 'url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
              ),
              'update' => array(
                 'label'=>Yii::t('app','Edit'),
                 'url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
              ),
              'delete' => array(
                 'label'=>Yii::t('app','Delete'),
                 'url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
              ),
           ),
        ),
    ),
));
 
?>

