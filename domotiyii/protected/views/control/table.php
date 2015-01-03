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
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mousewheel.min.js"></script>
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
    td.valueOn {
        background-color:#DEFFAC;
    }
    .spDevice {
        background-color: #006dcc;
        color: white;
        width: 90px;
        height: 30px;
        margin-top:5px;
    }    
    .inputSetPoint {
        width: 30px;
        text-align: center;
        margin-top: 10px;
    }
    .btMoins,.btPlus {
        background-color: #006dcc;
        border:1px solid #006dcc;
        color: white;
        width:15px;
        text-align:center;
        padding:0px;
        font-weight: bold;
    }

</style>

<?php
$lstLocation = array(array('label' => Yii::t('app', 'All'), 'url' => 'table?type=' . $type . '&location=All'));
foreach (Locations::model()->used()->findAll(array('order' => 't.name')) as $l) {
    array_push($lstLocation, array('label' => $l->name, 'url' => 'table?type=' . $type . '&location=' . $l->name));
}
$this->widget('bootstrap.widgets.TbNav', array(
    'type' => 'tabs',
    'stacked' => false,
    'items' => array(
        array('label' => Yii::t('app', 'Type') . ' : ' . Yii::t('app', $type), 'items' => array(
                array('label' => Yii::t('app', 'Control'), 'url' => 'table?type=Control&location=' . $location, 'active' => $type == 'Control'),
                array('label' => Yii::t('app', 'All'), 'url' => 'table?type=All&location=' . $location, 'active' => $type == 'All'),
                array('label' => Yii::t('app', 'Sensors'), 'url' => 'table?type=Sensors&location=' . $location, 'active' => $type == 'Sensors'))),
        array('label' => Yii::t('app', 'Location') . ' : ' . Yii::t('app', $location), 'items' => $lstLocation),
        array('label' => Yii::t('app', 'FullScreen'), 'url' => 'javascript:fullScreen();')
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
                $(v).addClass('valueOn');
                $(v).html('<span class="badge badge-success">' + $(v).html() + '</span>');
            } else {
                $(v).html('<span class="badge badge-info">' + $(v).html() + '</span>');
            }
        });
        initSliders();
        $('.btSetPoint').on('click', function(event) {
            btSetPoint(event, this);
        });
        $('input.inputSetPoint').mousewheel(function(event, delta) {
            event.preventDefault();
            if (delta > 0)
                $(this).parents('td').find('button.btPlus').trigger('click');
            if (delta < 0)
                $(this).parents('td').find('button.btMoins').trigger('click');
        });

        updateOK = true;
    }
    function fullScreen(tmp) {
        var delay = (typeof tmp == 'undefined') ? 1000 : tmp;
        if ($('div.row-fluid > div.spaanold10').length === 0) {
            $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/updateSession', {fullScreen: 1});
            $('div.row-fluid > div.span10').removeClass('span10').addClass('spaanold10');
            $('div.flash-success').hide(delay);
            $('div.navbar').hide(delay);
            $('ul.breadcrumb').hide(delay);
            $('div#sidebar').hide(delay);
        } else {
            $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/updateSession', {fullScreen: 0});
            $('div.row-fluid > div.spaanold10').addClass('span10').removeClass('spaanold10');
            $('div.flash-success').show(delay);
            $('div.navbar').show(delay);
            $('ul.breadcrumb').show(delay);
            $('div#sidebar').show(delay);
        }
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
            "sAjaxSource": '<?php echo Yii::app()->request->baseUrl; ?>/control/table' + (window.location.search || '?') + '&ajax',
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

<?php if (isset(yii::app()->session['fullScreen'])): ?>
            fullScreen(0);
<?php endif; ?>
        needRefresh();

    }

    function needRefresh() {
        if (maxdate !== '' && updateOK)
            $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/lastChanged' + window.location.search, function(data) {
                if (data != null && data != '?') {
                    $('.lastChanged').html('<b>Last change on server</b> : ' + data + ' - <b>Last change here</b> : ' + maxdate);
                    if (maxdate != data) {
                        updateOK = false;
                        devTable.fnDraw(false);
                    }
                }
                if (data != null && data === '?') {
                    updateOK = false;
                    $('.lastChanged').html('<b>Nothing to be refreshed :(</b>');
                }
            });
<?php if (is_null(yii::app()->request->getParam('debug'))): ?>
            setTimeout('needRefresh()', 2000);
<?php endif; ?>
    }

    function SPAction(value, device) {
        $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/setDevice', {device: device, action: 'SP ' + value},
        function(data) {
            if (data.result) {
                $('button').attr('disabled', 'disabled');
                updateOK = false;
                location.reload();
            } else
                $('.lastChanged').html('DO');
        }, 'json').fail(function() {
            $('.lastChanged').html('DF');
        });
    }
    function btAction(event, but) {
        event.stopPropagation();
        $(but).removeClass('btn-primary');
        var device = $(but).data('device');
        var action = $(but).data('action');
        $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/setDevice', {device: device, action: action},
        function(data) {
            if (data.result) {
                updateOK = false;
                devTable.fnDraw(false);
            } else
                $('.lastChanged').html('DO');
        }, 'json').fail(function() {
            $('.lastChanged').html('DF');
        });
    }
    function btSetPoint(event, but) {
        event.stopPropagation();
        var comma = false;
        var inputField = $(but).parents('td.commands').find('input.inputSetPoint');
        var value = inputField.val();
        if (value.indexOf(',') !== -1) {
            comma = true;
            value = value.replace(',', '.');
        }
        value *= 10;
        if ($(but).hasClass('btMoins')) {
            value = value - 1;
            value /= 10;
            value = new String(value);
            if (comma)
                value = value.replace('.', ',');
            inputField.val(value);
        } else if ($(but).hasClass('btPlus')) {
            value = value + 1;
            value /= 10;
            value = new String(value);
            if (comma)
                value = value.replace('.', ',');
            inputField.val(value);
        } else if ($(but).hasClass('btSetPoint')) {
            value /= 10;
            value = new String(value);
            if (comma)
                value = value.replace('.', ',');
            SPAction(value, $(but).data('device'));
        }
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
            $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/setDevice', {device: device, action: action},
            function(data) {
                if (data.result) {
                    updateOK = false;
                    devTable.fnDraw();
                } else
                    $('.lastChanged').html('DO');
            }, 'json').fail(function() {
                $('.lastChanged').html('DF');
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
