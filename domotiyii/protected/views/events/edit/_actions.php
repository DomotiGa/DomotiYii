
<h4><?php echo yii::t('app','Be carefull adding/removing an action from the event is immediately saved !!'); ?></h4>
<?php
/* @var $this DevicesController */
/* @var $model Devices */
$dp = new CActiveDataProvider('EventsActions', array(
    'criteria' => array(
        'condition' => 't.event=' . $model->id,
        'order' => 't.order')));

$this->widget('domotiyii.LiveGridView', array(
    'id' => 'all-eventsActions-grid',
    'type' => 'striped condensed',
    'dataProvider' => $dp,
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'action',
            'header' => '#',
            'htmlOptions' => array('width' => '20')),
        array('name' => 'name',
            'header' => Yii::t('app', 'Name'),
            'value' => '$data->l_action->name',
            'htmlOptions' => array('width' => '120')),
        array('name' => 'description',
            'header' => Yii::t('app', 'Description'),
            'value' => '$data->l_action->description',
            'htmlOptions' => array('width' => '120')),
        array('name' => 'order',
            'header' => Yii::t('app', 'Order'),
            'htmlOptions' => array('width' => '120')),
        array('name' => 'delay',
            'header' => Yii::t('app', 'Delay'),
            'htmlOptions' => array('width' => '120')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => Yii::app()->user->isGuest ? '{view}' : '{view} {update}',
            'header' => Yii::t('app', 'Actions'),
            'htmlOptions' => array('style' => 'width: 40px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => 'Yii::app()->controller->createUrl("actions/view", array("id"=>$data["action"],"event_id"=>' . $model->id . ',"event_action"=>"update"))',
                ),
                'update' => array(
                    'label' => Yii::t('app', 'Edit'),
                    'url' => 'Yii::app()->controller->createUrl("actions/update", array("id"=>$data["action"],"event_id"=>' . $model->id . ',"event_action"=>"update"))',
                ),
//              'delete' => array(
//                 'label'=>Yii::t('app','Delete'),
//                 'url'=>'Yii::app()->controller->createUrl("actions/delete", array("id"=>$data["id"],"command"=>"delete"))',
//              ),
            ),
        ),
        array('name' => 'Action',
            'header' => '',
            'type' => 'raw',
            'value' => '"<button type=button class=\"btn btn-primary btn-mini removeAction\" onClick=\"btAction(this)\" data-type=\"remove\" data-id-event=\"' . $model->id . '\" data-id-action=\"".$data[\'action\']."\">' . Yii::t('app', 'Remove from event') . '</button>"',
            'htmlOptions' => array('width' => '120')),
    ),
));
?>
<legend><?php echo yii::t('app', 'Actions to add to event'); ?></legend>

<?php

$lstAction = array();
foreach ($model->actions as $p)
    array_push($lstAction, $p->id);
$crit = new CDbCriteria;
$crit->addNotInCondition('id', $lstAction);
$crit->order='t.name';
$dp = new CArrayDataProvider(Actions::model()->findAll($crit));
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'all-freeactions-grid',
    'type' => 'striped condensed',
    'dataProvider' => $dp,
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'id', 'header' => '#', 'htmlOptions' => array('width' => '20')),
        array('name' => 'name', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '120')),
        array('name' => 'description', 'header' => Yii::t('app', 'Description'), 'htmlOptions' => array('width' => '120')),
        array('name' => 'type', 
            'header' => Yii::t('app', 'Type'), 
            'value'=>'$data->getActionText($data->type)',
            'htmlOptions' => array('width' => '120')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => Yii::app()->user->isGuest ? '{view}' : '{view} {update}',
            'header' => Yii::t('app', 'Actions'),
            'htmlOptions' => array('style' => 'width: 40px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => 'Yii::app()->controller->createUrl("actions/view", array("id"=>$data["id"],"event_id"=>' . $model->id . ',"event_action"=>"update"))',
                ),
                'update' => array(
                    'label' => Yii::t('app', 'Edit'),
                    'url' => 'Yii::app()->controller->createUrl("actions/update", array("id"=>$data["id"],"event_id"=>' . $model->id . ',"event_action"=>"update"))',
                ),
//              'delete' => array(
//                 'label'=>Yii::t('app','Delete'),
//                 'url'=>'Yii::app()->controller->createUrl("actions/delete", array("id"=>$data["id"],"command"=>"delete"))',
//              ),
            ),
        ),
        array('name' => 'Action',
            'header' => '',
            'type' => 'raw',
            'value' => '"<button type=button class=\"btn btn-primary btn-mini addAction\" onClick=\"btAction(this)\" data-type=\"add\" data-id-event=\"' . $model->id . '\" data-id-action=\"".$data[\'id\']."\">' . Yii::t('app', 'Add to event') . '</button>"', 'htmlOptions' => array('width' => '120')
        ),
    ),
));
?>

<script>
    function btAction(but) {
        var idEvent = $(but).data('idEvent');
        var idAction = $(but).data('idAction');
        var type = $(but).data('type');
        if (type === 'add') {
            $.get('<?php echo Yii::app()->request->baseUrl ?>/EventsActions/create',
                    {EventsActions: {event: idEvent, action: idAction,  delay: 0}},
                    function(data) {
//                        alert(data);
                        $.fn.yiiGridView.update('all-eventsActions-grid');
                    });
        } else {
            $.get('<?php echo Yii::app()->request->baseUrl ?>/EventsActions/delete',
                    {event: idEvent, action: idAction},
                    function(data) {
//                        alert(data);
                        $.fn.yiiGridView.update('all-eventsActions-grid');
                    });
        }
        return false;
    }
</script>





