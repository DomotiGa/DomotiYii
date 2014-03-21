<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Devices CMD') . ' Experimental page - trying to do a fast refreshable page with buttons to command devices',
    ),
));
?>
<style>
    .devicesList td {
        padding:5px;
        line-height: 15px;
        vertical-align: middle;
    }
</style>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
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
</table>

<script>
    $(document).ready(go());

    function go() {
        devTable = $('.devicesList').dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false,
            "aaSorting": [[1, "asc"]],
            "bServerSide": true,
            "sAjaxSource": '<?php echo Yii::app()->homeUrl; ?>cmd/?ajax',
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
                devTable.fnDraw();
            } else
                alert('Error');
        }, 'json').fail(function() {
            alert('Error setting device!!');
        });
    }

</script>
