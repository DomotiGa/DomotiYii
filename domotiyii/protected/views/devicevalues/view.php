<?php
/* @var $this DeviceValuesController */
/* @var $model DeviceValues */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'DeviceValues') => 'index',
        Yii::t('app', 'View'),
    ),
));

$this->beginWidget('zii.widgets.CPortlet', array(
    'htmlOptions' => array(
        'class' => ''
    )
));
if (!is_null(Yii::app()->request->getParam('device_id'))) {
    $device_id = Yii::app()->request->getParam('device_id');
    $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_PILLS,
        'items' => array(
            array('label' => Yii::t('app', 'View'), 'icon' => 'icon-eye-open', 'url' => array('view', 'id' => $model->id), 'active' => true, 'linkOptions' => array()),
            array('label' => Yii::t('app', 'Return to Device').' '.$model->device->name, 'icon' => 'icon-eye-open', 'url' => array('/devices/update', 'id' => $device_id,'activeTab'=>'values'), 'linkOptions' => array('style'=>'padding:6px;border:2px solid red;')),
        ),
    ));
    $this->endWidget();
} else {
    $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_PILLS,
        'items' => array(
            array('label' => Yii::t('app', 'List'), 'icon' => 'icon-th-list', 'url' => Yii::app()->controller->createUrl('index'), 'linkOptions' => array()),
            array('label' => Yii::t('app', 'Create'), 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array()),
            array('label' => Yii::t('app', 'View'), 'icon' => 'icon-eye-open', 'url' => array('view', 'id' => $model->id), 'active' => true, 'linkOptions' => array()),
            array('label' => Yii::t('app', 'Edit'), 'icon' => 'icon-edit', 'url' => array('update', 'id' => $model->id)),
            array('label' => Yii::t('app', 'Delete'), 'icon' => 'icon-trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this value?')))
        ),
    ));
    $this->endWidget();
}
?>

<legend><?php echo $model->device->name; ?>
    <?php
    if (isset($device_id)) {
        echo ' - Viewing Value number ', $model->valuenum;
    }
    ?>
</legend>

<?php
$this->widget('domotiyii.DetailView', array(
    'type' => 'striped condensed',
    'data' => $model,
    'attributes' => array(
        array('name' => 'device_id'),
        array('name' => 'valuenum'),
        array('name' => 'value'),
        array('name' => 'correction'),
        array('name' => 'units'),
        array('name' => 'log', 'type' => 'boolean'),
        array('name' => 'logdisplay', 'type' => 'boolean'),
        array('name' => 'logspeak', 'type' => 'boolean'),
        array('name' => 'rrd', 'type' => 'boolean'),
        array('name' => 'graph', 'type' => 'boolean'),
        array('name' => 'valuerrdsname'),
        array('name' => 'valuerrdtype'),
        array('name' => 'lastchanged'),
        array('name' => 'lastseen'),
        array('name' => 'type'),
        array('name' => 'description'),
    ),
));
?>
