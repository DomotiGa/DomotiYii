<?php
/* @var $this ActionsController */
/* @var $model Actions */
if (!is_null(Yii::app()->request->getParam('event_id'))) {
    $event_id = Yii::app()->request->getParam('event_id');
    $event_action = Yii::app()->request->getParam('event_action', 'view');
    $event=  Events::model()->findByPk($event_id);
    $eventName=$event->name;
}
if (isset($event_id)) {
    $homeURL = Yii::app()->homeUrl;
    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
        'links' => array(
            Yii::t('app', 'Events') => $homeURL . 'events/index',
            $eventName => $homeURL . 'events/' . $event_action . '/' . $event_id,
            Yii::t('app', 'EventActions') => $homeURL . 'events/' . $event_action . '/' . $event_id . '?activeTab=actions',
            Yii::t('app', 'View'),
        ),
    ));
} else {
    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
        'links' => array(
            Yii::t('app', 'Actions') => 'index',
            Yii::t('app', 'View'),
        ),
    ));
}

$this->beginWidget('zii.widgets.CPortlet', array(
    'htmlOptions' => array(
        'class' => ''
    )
));

if (isset($event_id)) {
    $this->widget('bootstrap.widgets.TbNav', array(
        'type' => TbHtml::NAV_TYPE_PILLS,
        'items' => array(
            array('label' => Yii::t('app', 'Return to Event') . ' ' . $eventName, 'icon' => 'icon-eye-open', 'url' => array('/events/' . $event_action, 'id' => $event_id, 'activeTab' => 'actions'), 'linkOptions' => array('style' => 'padding:6px;border:2px solid red;')),
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
            array('label' => Yii::t('app', 'Run Now'), 'icon' => 'icon-play', 'url' => array('run', 'id' => $model->id), 'linkOptions' => array()),
            array('label' => Yii::t('app', 'Edit'), 'icon' => 'icon-edit', 'url' => array('update', 'id' => $model->id)),
            array('label' => Yii::t('app', 'Delete'), 'icon' => 'icon-trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this action?')))
        ),
    ));
    $this->endWidget();
}
?>

<legend><?php echo $model->name; ?>
    <?php
    if (isset($event_id)) {
        echo ' - Viewing action of event ', $eventName;
    }
    ?>

</legend>

<?php /* $this->widget('domotiyii.DetailView', array(
  'type' => 'striped condensed',
  'data'=>$model,
  'attributes'=>array(
  array('name' => 'id'),
  array('name' => 'name'),
  array('name' => 'description'),
  array('name' => 'actiontype'),
  array('name' => 'param1'),
  array('name' => 'param2'),
  array('name' => 'param3'),
  array('name' => 'param4'),
  array('name' => 'param5'),
  ),
  )); */ ?>
<?php
//we use same form as for update/create to have same dynamic fields
echo $this->renderPartial('_form', array('model' => $model, 'readonly' => 1));
?>
