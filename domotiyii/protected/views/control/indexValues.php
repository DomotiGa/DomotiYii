<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

$type = Yii::app()->request->getParam('type', 'Control');
$location = Yii::app()->request->getParam('location', 'All');

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Control Table'),
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
    .devicesList td {
        padding:3px;
        line-height: 14px;
        vertical-align: middle;
        border-bottom: 1px solid black;
        border-right: 1px solid grey;
    }
    tr.odd {
        background-color: azure;
    }
    tr.even {
        background-color: ghostwhite;
    }
    td.commands,th.commands {
        text-align: center;
        width:280px;
    }
    td.values,th.values {
        text-align:center;
    }
    .slider-container {
        background-color: lightblue;
    }
</style>

<?php
$lstLocation = array(array('label' => Yii::t('app', 'All'), 'url' => '?type=' . $type . '&location=All'));
foreach (Locations::model()->used()->findAll(array('order' => 't.name')) as $l) {
    array_push($lstLocation, array('label' => $l->name, 'url' => '?type=' . $type . '&location=' . $l->name));
}
$this->widget('bootstrap.widgets.TbNav', array(
    'type' => 'tabs',
    'stacked' => false,
    'items' => array(
        array('label' => Yii::t('app', 'Type') . ' : ' . Yii::t('app', $type), 'items' => array(
                array('label' => Yii::t('app', 'Control'), 'url' => '?type=Control&location=' . $location, 'active' => $type == 'Control'),
                array('label' => Yii::t('app', 'All'), 'url' => '?type=All&location=' . $location, 'active' => $type == 'All'),
                array('label' => Yii::t('app', 'Sensors'), 'url' => '?type=Sensors&location=' . $location, 'active' => $type == 'Sensors'))),
        array('label' => Yii::t('app', 'Location') . ' : ' . Yii::t('app', $location), 'items' => $lstLocation)
    ),
));
?>
<table class="table devicesList">
    <thead>
        <tr>
            <th>id</th>
            <th></th>
            <th><?php echo Yii::t('app', 'Name'); ?></th>
            <th><?php echo Yii::t('app', 'Location'); ?></th>
            <th class="commands"><?php echo Yii::t('app', 'Actions'); ?></th>
            <th><?php echo Yii::t('app', 'Value 1'); ?></th>
            <th><?php echo Yii::t('app', 'Value 2'); ?></th>
            <th><?php echo Yii::t('app', 'Value 3'); ?></th>
            <th><?php echo Yii::t('app', 'Value 4'); ?></th>
            <th><?php echo Yii::t('app', 'Last Seen'); ?></th>
        </tr>
    </thead>
</table>   
<div style="text-align:center;margin:0px;" class="lastChanged"></div>
<script>
    var maxdate = '0';
    var updateOK = true;
    function formatTable() {
        maxdate = '';
        $('.devicesList').find('tr').each(function(i, v) {
            var tmp = $(v).find('td:last').addClass('colDate').text();
            $(v).find('td:last').html('<span class="label label-info">' + $(v).find('td:last').html() + '</span>');
            if (tmp > maxdate)
                maxdate = tmp;
        });
        var datestr = maxdate.split(' ')[0];
        $('.devicesList').find('td:contains(' + maxdate + ')').each(function(i, v) {
            $(v).find('span.label').removeClass('label-info').addClass('label-success');
            var tmp = $(v).parent('tr');
            tmp.fadeOut(0, function() {
                tmp.fadeIn(800);
            });
            tmp.css('background-color', 'palegreen');
        });
        $('.devicesList').find('td:contains(' + datestr + ')').each(function(i, v) {
            var tmp = $(v).html();
            $(v).html(tmp.replace(datestr, ''));
        });
        $('td.names').each(function(i, v) {
            $(v).html('<span class="label label-info">' + $(v).html() + '</span>');
        });
        $('td.locations').each(function(i, v) {
            $(v).html('<span class="badge badge-info">' + $(v).html() + '</span>');
        });
        $('td.values').each(function(i, v) {
            if ($(v).text() == 'On') {
                $(v).html('<span class="badge badge-success">' + $(v).html() + '</span>');
            } else {
                $(v).html('<span class="badge badge-info">' + $(v).html() + '</span>');
            }
        });
        initSliders();
    }
    $(document).ready(go());
    function go() {
        devTable = $('.devicesList').dataTable({
            "fnDrawCallback":
                    formatTable,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false,
            "aaSorting": [[1, "asc"]],
            "bServerSide": true,
            "sAjaxSource": '<?php echo Yii::app()->homeUrl; ?>control/' + $('ul.nav-tabs li.active a').attr('href') + '&ajax',
            "aoColumnDefs": [{"bVisible": false, "aTargets": [0]},
                {"sClass": 'names', "aTargets": [2]},
                {"sClass": 'locations', "aTargets": [3]},
                {"sClass": 'commands', "aTargets": [4]},
                {"sClass": 'values', "aTargets": [5]},
                {"sClass": 'values', "aTargets": [6]},
                {"sClass": 'values', "aTargets": [7]},
                {"sClass": 'values', "aTargets": [8]}
            ]
        });

        needRefresh();
    }

    function needRefresh() {
        if (maxdate !== '' && updateOK)
            $.get('<?php echo Yii::app()->homeUrl; ?>control/lastChanged' + $('ul.nav-tabs li.active a').attr('href'), function(data) {
                if (data != null && data != '?') {
                    $('.lastChanged').html('<b>Last change on server</b> : ' + data + ' - <b>Last change here</b> : ' + maxdate);
                    if (maxdate != data)
                        devTable.fnDraw();
                }
                if (data != null && data === '?') {
                    updateOK = false;
                    $('.lastChanged').html('<b>Nothing to be refreshed :(</b>');
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
        $('.slider-container').on('mouseover', function() {
            $(this).css('background-color', 'lightblue');
            updateOK = false;
        }).on('mouseout', function() {
            $(this).css('background-color', '');
            updateOK = true;
        })
    }
</script>
