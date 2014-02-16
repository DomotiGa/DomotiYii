<?php
/* @var $this DevicesController */
/* @var $model Devices */

$config = array();
$dataProvider = new CArrayDataProvider($rawData = $model->actions, $config);

$this->widget('domotiyii.LiveGridView', array(
    'id' => 'all-devices-grid',
    'type' => 'striped condensed',
    'dataProvider' => $dataProvider,
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'id', 'header' => '#', 'htmlOptions' => array('width' => '20')),
        array('name' => 'name', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '120')),
        array('name' => 'description', 'header' => Yii::t('app', 'Description'), 'htmlOptions' => array('width' => '120')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
            'header' => Yii::t('app', 'Actions'),
            'htmlOptions' => array('style' => 'width: 40px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => '',
                ),
                'update' => array(
                    'label' => Yii::t('app', 'Edit'),
                    'url' => 'Yii::app()->controller->createUrl("actions/update", array("id"=>$data["id"]))',
                ),
                'delete' => array(
                    'label' => Yii::t('app', 'Delete'),
                    'url' => 'Yii::app()->controller->createUrl("actions/delete", array("id"=>$data["id"],"command"=>"delete"))',
                ),
            ),
        ),
    ),
));
?>
<?php $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'action',
    'header' => 'Actions Form',
    'content' => '',
    'footer' => array(
        TbHtml::button('Save Changes', array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
     ),
)); ?>
 
<?php echo TbHtml::button('Click me to open modal', array(
    'style' => TbHtml::BUTTON_COLOR_PRIMARY,
    'size' => TbHtml::BUTTON_SIZE_LARGE,
    'data-toggle' => 'modal',
    'data-target' => '#action',
)); ?>
<button type="button" id="updateAction" data-target="#action" data-toggle="modal">Action</button>
<script>
    $('.view').on('click',function(){
        $('#updateAction').click();
        $('#action').find('.modal-body').text('coucou');
    });
    
    function view(id) {
        $('#action').find('.modal-body').text('coucou');
    }
    </script>