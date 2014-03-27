<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Devices CMD') . ' Experimental page - trying to do a fast refreshable page with buttons to command devices',
    ),
));
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap-slider.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slider.css" />

<style>
    td.colDate,th:last-child {
        text-align:right;
    }
    .newdata {
        color:black;
        background-color:yellow;
        border:2px solid green;
    }
    .devicesList td {
        padding:3px;
        line-height: 14px;
        vertical-align: middle;
    }
</style>

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
            <th>LastChanged</th>
        </tr>
    </thead>
</table>   
<div style="text-align:center;margin:0px;" class="lastChanged"></div>
<script>
    var maxdate = '0';
    var updateOK=true;
    function getLastDate() {
        maxdate = '';
        $('.devicesList').find('tr').each(function(i, v) {
            var tmp = $(v).find('td:last').addClass('colDate').text();
            if (tmp > maxdate)
                maxdate = tmp;
        });
        var datestr = maxdate.split(' ')[0];
        $('.devicesList').find('td:contains(' + maxdate + ')').each(function(i, v) {
            $(v).html('<span class="newdata">' + $(v).html() + '</span>');
            var tmp = $(v).parent('tr');
            tmp.fadeOut(0, function() {
                tmp.fadeIn(800);
            });
        });
        $('.devicesList').find('td:contains(' + datestr + ')').each(function(i, v) {
            var tmp = $(v).html();
            $(v).html(tmp.replace(datestr, ''));
        });
        initSliders();
    }
    $(document).ready(go());
    function go() {
        devTable = $('.devicesList').dataTable({
            "fnDrawCallback":
                    getLastDate,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false,
            "aaSorting": [[1, "asc"]],
            "bServerSide": true,
            "sAjaxSource": '<?php echo Yii::app()->homeUrl; ?>control/?ajax',
            "aoColumnDefs": [{"bVisible": false, "aTargets": [0]}]
        });

        needRefresh();
    }

    function needRefresh() {
        if (maxdate !== '' && updateOK)
            $.get('<?php echo Yii::app()->homeUrl; ?>control/lastChanged', function(data) {
                if (data != null) {
                    $('.lastChanged').html('<b>Last change on server</b> : ' + data + ' - <b>Last change here</b> : ' + maxdate);
                    if (maxdate != data)
                        devTable.fnDraw();
                }
            });
        setTimeout('needRefresh()', 2000);
    }

    function btAction(event, but) {
        event.stopPropagation();
        $(but).removeClass('btn-primary');
        var device = $(but).data('device');
        var action = $(but).data('action');
        $.get('<?php echo Yii::app()->homeUrl; ?>control/setDevice', {device: device, action: action},
        function(data) {
            if (data.result) {
                devTable.fnDraw();
            } else
                alert('Error');
        }, 'json').fail(function() {
            alert('Error setting device!!');
        });
    }
    function initSliders() {
        $('.slider').slider()
                .on('slideStop', function(ev) {
            var action = ev.value;
            var device = $(this).data('device');

            if (action == 0) {
                action = "Off";
            } else if (action == 100) {
                action = "On";
            } else {
                action = "Dim " + action;
            }
            $.get('<?php echo Yii::app()->homeUrl; ?>control/setDevice', {device: device, action: action},
            function(data) {
                if (data.result) {
                    devTable.fnDraw();
                } else
                    alert('Error');
            }, 'json').fail(function() {
                alert('Error setting device!!');
            });
        }).on('slide', function(ev) {
            $(this).parents('td').next('td').text(ev.value);
        });
        $('.slider-container').on('mouseover',function(){
            $(this).css('background-color','lightblue');
            updateOK=false;
        }).on('mouseout',function(){
            $(this).css('background-color','');
            updateOK=true;
        })
    }
</script>
