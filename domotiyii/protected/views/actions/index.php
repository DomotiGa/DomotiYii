<?php
/* @var $this ActionsController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Actions'),
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('all-actions-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

$this->beginWidget('zii.widgets.CPortlet', array(
    'htmlOptions' => array(
        'class' => ''
    )
));
$this->widget('bootstrap.widgets.TbNav', array(
    'type' => TbHtml::NAV_TYPE_PILLS,
    'items' => array(
        array('label' => Yii::t('app', 'List'), 'icon' => 'icon-th-list', 'url' => Yii::app()->controller->createUrl('index'), 'active' => true, 'linkOptions' => array()),
        array('label' => Yii::t('app', 'Search'), 'icon' => 'icon-search', 'url' => '#', 'linkOptions' => array('class' => 'search-button')),
        array('label' => Yii::t('app', 'Create'), 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array()),
    ),
    'htmlOptions' => array('class' => 'center'),
));
$this->endWidget();
?>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('domotiyii.LiveGridView', array(
    'id' => 'all-actions-grid',
    //'refreshTime' => Yii::app()->params['refreshActions'], // x second refresh as defined in config
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'template' => '{items}{pager}{summary}',
    'afterAjaxUpdate' => 'go(id,options)',
    'selectableRows' => 1,
    'columns' => array(
        array('name' => 'id', 'header' => '#', 'htmlOptions' => array('width' => '20')),
        array('name' => 'name', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '150')),
        array('name' => 'action',
            'header' => Yii::t('app', 'Type'),
            'type' => 'raw',
            'value' => '$data->getActionText($data->type)',
            'htmlOptions' => array('width' => '100'),
        ),
        array('name' => 'param1', 'header' => Yii::t('app', 'Param'), 'htmlOptions' => array('width' => '50')),
        array('name' => 'param2', 'header' => Yii::t('app', 'Param2'), 'htmlOptions' => array('width' => '50')),
        array('name' => 'param3', 'header' => Yii::t('app', 'Param3'), 'htmlOptions' => array('width' => '50')),
        array('name' => 'param4', 'header' => Yii::t('app', 'Param4'), 'htmlOptions' => array('width' => '50')),
        array('name' => 'param5', 'header' => Yii::t('app', 'Param5'), 'htmlOptions' => array('width' => '50')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
            'header' => Yii::t('app', 'Actions'),
            'htmlOptions' => array('style' => 'width: 115px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => '$data["id"]',
                ),
                'update' => array(
                    'label' => Yii::t('app', 'Edit'),
                    'url' => '$data["id"]',
                ),
                'delete' => array(
                    'label' => Yii::t('app', 'Delete'),
                    'url' => 'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
                ),
            ),
        ),
    ),
));
?>
<?php
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'action',
    'header' => 'Action',
    'htmlOptions'=>array('style' => 'width: 800px; margin-left: -400px'),
    'content' => 'refreshing',
    'footer' => array(
        //TbHtml::button('Save Changes', array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),
));
?>

<button type="button" id="updateAction" data-target="#action" data-toggle="modal">Action</button>
<script>
    function go(id,options) {
        $('.view').attr('data-toggle', 'modal').attr('data-target', '#action').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            $.get('<?php echo Yii::app()->homeUrl ?>actions/view', {id: id, 'AJAXMODAL': 1}, function(data) {
                $('#action').find('.modal-body').html(data);
            },'html');
        });
        $('.update').attr('data-toggle', 'modal').attr('data-target', '#action').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            $.get('<?php echo Yii::app()->homeUrl ?>actions/update', {id: id, 'AJAXMODAL': 1}, function(data) {
                $('#action').find('.modal-body').html(data);
            });
        });
    }
    go();
</script>