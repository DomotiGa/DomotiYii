<?php
/* @var $this DevicesController */
/* @var $model Devices */

$config = array();
$dataProvider = new CArrayDataProvider($rawData = $model->actions, $config);

$this->widget('domotiyii.LiveGridView', array(
    'id' => 'all-devices-grid',
    'type' => 'striped condensed',
    'dataProvider' => $dataProvider,
    'afterAjaxUpdate' => 'go(id,options)',
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'id', 'header' => '#', 'htmlOptions' => array('width' => '20')),
        array('name' => 'name', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '120')),
        array('name' => 'description', 'header' => Yii::t('app', 'Description'), 'htmlOptions' => array('width' => '120')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => Yii::app()->user->isGuest ? '{view}' : '{view} {update}',
            'header' => Yii::t('app', 'Actions'),
            'htmlOptions' => array('style' => 'width: 40px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => '$data["id"]',
                ),
                'update' => array(
                    'label' => Yii::t('app', 'Edit'),
                    'url' => '$data["id"]',
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
    'content' => '',
    'footer' => '' //array(
    //TbHtml::button('Save Changes', array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    //TbHtml::button('Close', array('data-dismiss' => 'modal')),
    //),
));
?>

<script>
    var butClose = '<button data-dismiss="modal" class="btn" name="yt1" type="button">Close</button>';
    function go() {
        $('.view').attr('data-target', '#action').attr('data-toggle', 'modal').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            $.get('<?php echo yii::app()->getHomeUrl() ?>/actions/view?id=' + id + '&AJAXMODAL=1', function(data) {
                $('#action').find('.modal-body').html(data);
                $('#action').find('.modal-footer').html(butClose);
                $('#action').find('input,select').css('width', '100%');
            });
        });
        $('.update').attr('data-target', '#action').attr('data-toggle', 'modal').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            $.get('<?php echo yii::app()->getHomeUrl() ?>/actions/update?id=' + id + '&AJAXMODAL=1', function(data) {
                $('#action').find('.modal-body').html(data).append('<div id="message"></div>');
                $('#action').find('input,select,textarea').css('width', '100%').addClass('span5');
                $('#action').find('.modal-footer').html(butClose);
                $('#action').find('.modal-footer').prepend($('.form-actions').html());
                $('.form-actions').hide();
                $('.modal-body').css('max-height', '500px');
                $('#action').find('.modal-footer').find('.btUpdate').on('click', function(e) {
                    e.preventDefault();
                    var dataToSend = $('#actions-form').serialize();
                    dataToSend+='&id='+id;
                    $.get('<?php echo yii::app()->getHomeUrl() ?>/actions/update', dataToSend, function(result) {
                        $('#message').html(result);
                    });
                });
                $('#action').find('.modal-footer').find('.btReset').on('click', function(e) {
                    e.preventDefault();
                    $('.form-actions').find('.btReset').click();

                });
            });
        });
    }
    go();
</script>