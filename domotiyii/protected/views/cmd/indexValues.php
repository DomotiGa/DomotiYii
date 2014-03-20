<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Devices') . ' Experimental page',
    ),
));
?>

<?php
if (0):
    $this->widget('bootstrap.widgets.TbNav', array(
        'type' => 'tabs',
        'stacked' => false,
        'items' => array(
            array('label' => Yii::t('app', 'All'), 'url' => 'indexValues?type=all', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'all'),
            array('label' => Yii::t('app', 'Enabled'), 'url' => 'indexValues?type=enabled', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'enabled'),
            array('label' => Yii::t('app', 'Sensors'), 'url' => 'indexValues?type=sensors', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'sensors'),
            array('label' => Yii::t('app', 'Dimmers'), 'url' => 'indexValues?type=dimmers', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'dimmers'),
            array('label' => Yii::t('app', 'Switches'), 'url' => 'indexValues?type=switches', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'switches'),
            array('label' => Yii::t('app', 'Hidden'), 'url' => 'indexValues?type=hidden', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'hidden'),
            array('label' => Yii::t('app', 'Disabled'), 'url' => 'indexValues?type=disabled', 'active' => Yii::app()->request->getParam('type', 'enabled') == 'disabled'),
        ),
    ));
endif;
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
<div class="row ">
    <table class="table devicesList">
        <thead>
            <tr>
                <th>id</th>
                <th>icon</th>
                <th>name</th>
                <th>locationtext</th>
                <th>Button</th>
                <th>Value1</th>
                <th>Value2</th>
                <th>Value3</th>
                <th>Value4</th>
                <th>lastseen</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($data as $d)
                echo '<tr><td>' . implode('</td><td>', $d) . '</td></tr>';
        ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(go());
    function go() {
        $('.devicesList').dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false,
            "aaSorting": [[1, "asc"]],
//            "bProcessing": true,
//            "bServerSide": false,
//            "sAjaxSource": '<?php echo Yii::app()->homeUrl; ?>cmd/?ajax',
            "aoColumnDefs": [
                {"bVisible": false, "aTargets": [0]}
            ]
        });
    }
    function btAction(event, but) {
        event.stopPropagation();
        $(but).removeClass('btn-primary');
        var device = $(but).data('device');
        var action = $(but).data('action');
        $.get('<?php echo Yii::app()->homeUrl; ?>cmd/setDevice', {device: device, action: action},
        function(data) {
            if (data.result) {
                $(but).parent().parent().find("td.value1").html(action);
                var tr = $(but).parent().parent();
                tr.fadeOut(0, function() {
                    tr.fadeIn(800);
                });
            } else
                alert('Error');
        }, 'json').fail(function() {
            alert('Error setting device!!');
        });
    }

</script>
