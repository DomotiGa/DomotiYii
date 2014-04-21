<?php
$type = Yii::app()->request->getParam('type', 'Control');
$location = Yii::app()->request->getParam('location', 'All');


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Control Box'),
    ),
));
$maxdate = '';
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/static/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap-slider.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/control_slider.css" />

<style>
    .device {
        border: 2px solid black;
        padding: 3px;
        margin: 2px;
        float: left;
        min-width: 290px;
        height: 125px;  
        background-color:#C9E0ED;
    }
    .device hr {
        margin: 0px;
        border-top: 1px solid black;
        border-bottom: none;
    }
    .device .id {
        display:none;
    }
    .device .showAllVal {
        display:none;
    }
    .device .location {
        float:right;
    }
    .device div {
        margin: 3px 0px 3px 0px;
    }
    .device .value {
        padding: 0px 3px;
        height: 23px;
    }
    .device .name {
        margin-left:10px;
    }
    .device .slabel {
        font-weight: bold;
    }
    .device .fixSpace {
        padding:8px;
    }
    .btn-mini {
        width:50px;
    }
    .device .slider-horizontal {
        margin-top: -5px;
    }
    .newdata {
        background-color:darkseagreen;
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
        width:30px;
        text-align:center;
        padding:0px;
        font-weight: bold;
    }
    .newdataAfter,.newdataBefore {
        background-color: yellow;
    }
    .device.deviceOn {
        background-color: lightgreen;
    }
    .badge {
        margin-top:2px;
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
        array('label' => Yii::t('app', 'Location') . ' : ' . Yii::t('app', $location), 'items' => $lstLocation),
        array('label' => Yii::t('app', 'FullScreen'), 'url' => 'javascript:fullScreen();')
    ),
));
?>
<div class="row-fluid">
    <?php foreach ($data as $dev): ?>
        <?php if ($maxdate < $dev['lastchanged']) $maxdate = $dev['lastchanged']; ?>
        <div class="device text-left" id="<?php echo $dev['id']; ?>">
            <div class="id"><?php echo $dev['id']; ?></div>
            <div class="title">
                <span class="icon"><?php echo $dev['icon']; ?>&nbsp;</span><span class="deviceName label label-info"><?php echo $dev['name']; ?></span>
                <i class="showValues icon-chevron-down"></i>
                <span class="badge badge-info location"><?php echo $dev['location']; ?></span>
            </div>
            <hr>
            <div class="value"><span class="slabel"><?php echo Yii::t('app', 'Value 1'); ?> : </span><div class="val1 label label-important"><?php echo $dev['val1']; ?></div></div>
            <div class="value showAllVal"><span class="slabel"><?php echo Yii::t('app', 'Value 2'); ?> : </span><div class="val2 label label-important"><?php echo $dev['val2']; ?></div></div>
            <div class="value showAllVal"><span class="slabel"><?php echo Yii::t('app', 'Value 3'); ?> : </span><div class="val3 label label-important"><?php echo $dev['val3']; ?></div></div>
            <div class="value showAllVal"><span class="slabel"><?php echo Yii::t('app', 'Value 4'); ?> : </span><div class="val4 label label-important"><?php echo $dev['val4']; ?></div></div>
            <div class="value"><span class="slabel"><?php echo Yii::t('app', 'Last Update'); ?> : </span><span class="newdataBefore"></span> <div class="lastchanged label label-info"><?php echo $dev['lastchanged']; ?></div> <span class="newdataAfter"></span></div>
            <div class="commands text-center"><?php echo $dev['commands']; ?></div>
        </div>
    <?php endforeach; ?>
</div>
<div style="text-align:center;margin:0px;" class="msgLastChanged"></div>
<script>
    var maxdate = '<?php echo $maxdate; ?>';
    var updateOK = true;
    var reloading = false;
    $(document).ready(go());
    function go() {
        $.ajaxSetup({
            timeout: 15000
        });

        $('.showValues').on('click', function() {
            if ($(this).hasClass('icon-chevron-down')) {
                $.cookie('allValues', '1', 15);
                $('.showAllVal').show(1000);
                $('.device').animate({height: '205px'}, 1000);
                $('.showValues').removeClass('icon-chevron-down').addClass('icon-chevron-up');
            } else {
                $.removeCookie('allValues');
                $('.showAllVal').hide(1000);
                $('.device').animate({height: '125px'}, 1000);
                $('.showValues').removeClass('icon-chevron-up').addClass('icon-chevron-down');
            }
        });
        $('.btSetPoint').on('click', function(event) {
            btSetPoint(event, this);
        });
        $('input.inputSetPoint').mousewheel(function(event, delta) {
            event.preventDefault();
            if (delta > 0)
                $(this).parents('div.device').find('button.btPlus').trigger('click');
            if (delta < 0)
                $(this).parents('div.device').find('button.btMoins').trigger('click');
        });
        $('div.lastchanged:contains(' + maxdate + ')').each(function(i, v) {
            $(v).next('.newdataAfter').html('&lt;&lt;&lt;&lt;');
            $(v).prev('.newdataBefore').html('&gt;&gt;&gt;&gt;');
        });
        formatPage();
        initSliders();
<?php if (is_null(yii::app()->request->getParam('debug'))): ?>
            needRefresh();
<?php endif; ?>
        if ($.cookie('fullScreen') === '1')
            fullScreen(0);

        if ($.cookie('allValues') === '1')
            $('.showValues').first().trigger('click');
    }

    function formatPage() {
        var datestr = maxdate.split(' ')[0];
        $('.newdataAfter,.newdataBefore').each(function(i, v) {
            if ($(v).text().length > 1)
                $(v).text($(v).text().replace('<', '').replace('>', ''));
            else if ($(v).text().length == 1)
                $(v).text('');
        });
        $('div.lastchanged:contains(' + datestr + ')').each(function(i, v) {
            var tmp = $(v).html();
            $(v).html(tmp.replace(datestr, ''));
        });

        $('.device .val1').each(function(i, v) {
            if ($(v).text() === 'On' || $(v).text().substring(0, 3) === 'Dim') {
                $(v).addClass('label-success').removeClass('label-important');
                $(v).parents('.device').find('.deviceName').addClass('label-success').removeClass('label-info');
                $(v).parents('.device').find('.location').addClass('badge-success').removeClass('badge-info');
                $(v).parents('.device').addClass('deviceOn');
                $(v).parents('.device').removeClass('deviceOff');
            } else {
                $(v).removeClass('label-success').addClass('label-important');
                $(v).parents('.device').find('.deviceName').removeClass('label-success').addClass('label-info');
                $(v).parents('.device').find('.location').removeClass('badge-success').addClass('badge-info');
                $(v).parents('.device').addClass('deviceOff');
                $(v).parents('.device').removeClass('deviceOn');
            }
        });
    }

    function fullScreen(tmp) {
        var delay = (typeof tmp == 'undefined') ? 1000 : tmp;
        if ($('div.row-fluid > div.spaanold10').length === 0) {
            $.cookie('fullScreen', '1', 15);
            $('div.row-fluid > div.span10').removeClass('span10').addClass('spaanold10');
            $('div.flash-success').hide(delay);
            $('div.navbar').hide(delay);
            $('ul.breadcrumb').hide(delay);
            $('div#sidebar').hide(delay);
        } else {
            $.removeCookie('fullScreen');
            $('div.row-fluid > div.spaanold10').addClass('span10').removeClass('spaanold10');
            $('div.flash-success').show(delay);
            $('div.navbar').show(delay);
            $('ul.breadcrumb').show(delay);
            $('div#sidebar').show(delay);
        }
    }

//TRYING LONG POLLING
    function needRefresh() {
        if (!updateOK || maxdate === '') {
            setTimeout('needRefresh()', 400);
            return;
        }
        $.ajax({url: '<?php echo Yii::app()->request->baseUrl; ?>/Control/listLongPoll' + $('ul.nav-tabs li.active a').attr('href') + '&ajax=1&date=' + maxdate, success: function(data) {
                if (data != null) {
                    maxdate = data.maxdate;
                    $('.msgLastChanged').html('<b>Last change on server</b> : ' + data.maxdate + ' - <b>Last change here</b> : ' + maxdate);
                    if (data.tab != null && data.tab.length > 0) {
                        for (var x = 0; x < data.tab.length; x = x + 1) {
                            var row = data.tab[x];
                            var id = row.id;
                            var dev = $('#' + id);
                            dev.animate({opacity: 0.15}, 100);
                            dev.find('.icon').html(row.icon);
                            dev.find('.location').html(row.location);
                            dev.find('.val1').html(row.val1);
                            dev.find('.val2').html(row.val2);
                            dev.find('.val3').html(row.val3);
                            dev.find('.val4').html(row.val4);
                            dev.find('.lastchanged').html(row.lastchanged);
                            dev.find('.newdataAfter').html('&lt;&lt;&lt;&lt;');
                            dev.find('.newdataBefore').html('&gt;&gt;&gt;&gt;');
                            if (dev.find('.slider').length > 0) {
                                var val = row.val1.replace('Dim ', '');
                                if (val === 'On')
                                    val = '100';
                                if (isNaN(val))
                                    val = '0';
                                dev.find('.commands').html(row.commands);
                                dev.removeClass('setup');
                            }
                            dev.animate({opacity: 1}, 2000);
                        }
                        initSliders();
                        formatPage();
                    }
                }
            }, complete: function() {
                $('button.btUsed').removeClass('btn-default').addClass('btn-primary');
                setTimeout('needRefresh()', 400);
            }, dataType: "json", timeout: 30000});
    }
    function deviceAction(device, action) {
        $('button').attr('disabled', 'disabled');
        updateOK = false;
        $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/setDevice', {device: device, action: action},
        function(data) {
            if (data.result) {
            } else
                $('.msgLastChanged').html('DO');
        }, 'json').fail(function() {
            $('.msgLastChanged').html('DF');
        }).always(function() {
            updateOK = true;
            $('button').removeAttr('disabled');
        });
    }
    function btAction(event, but) {
        $(but).removeClass('btn-primary').addClass('btn-default').addClass('btUsed');
        deviceAction($(but).data('device'), $(but).data('action'));
    }
    function btSetPoint(event, but) {
        var inputField = $(but).closest('.device').find('.inputSetPoint');
        var value = inputField.val();
        value *= 10;
        if ($(but).hasClass('btMoins')) {
            value = value - 1;
            value /= 10;
            value = new String(value);
            inputField.val(value);
        } else if ($(but).hasClass('btPlus')) {
            value = value + 1;
            value /= 10;
            value = new String(value);
            inputField.val(value);
        } else if ($(but).hasClass('btSetPoint')) {
            value /= 10;
            value = new String(value);
            deviceAction($(but).closest('.device').find('.id').text(), 'SP ' + value);
        }
    }
    function initSliders() {
        $('.slider').each(function(i, s) {
            if ($(s).closest('.device').hasClass('setup'))
                return;
            $(s).closest('.device').addClass('setup');
            $(s).slider()
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
                deviceAction(device, action);
            }).on('slide', function(ev) {
                $(this).parents('div.device').find('div.val1').text(ev.value);
            });
        });
    }
</script>
