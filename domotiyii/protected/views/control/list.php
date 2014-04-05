<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

$type = Yii::app()->request->getParam('type', 'Control');
$location = Yii::app()->request->getParam('location', 'All');


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Control Box'),
    ),
));
$maxdate = '';
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/static/bootstrap-slider.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slider_list.css" />

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
        array('label' => Yii::t('app', 'FullScreen'), 'url' => 'javascript:fullScreen();'),
        array('label' => Yii::t('app', 'Devices On'), 'url' => 'javascript:void(0);', 'htmlOptions' => array('class' => 'showDeviceOn')),
        array('label' => Yii::t('app', 'Devices Off'), 'url' => 'javascript:void(0);', 'htmlOptions' => array('class' => 'showDeviceOff'))
    ),
));
?>
<div class="row-fluid">
    <?php foreach ($data as $dev): ?>
        <?php if ($maxdate < $dev['lastchanged']) $maxdate = $dev['lastchanged']; ?>
        <div class="device text-left">
            <div class="id"><?php echo $dev['id']; ?></div>
            <div class="icon">
                <?php echo $dev['icon']; ?>&nbsp;<span class="deviceName label label-info"><?php echo $dev['name']; ?></span>
                <i class="showValues icon-chevron-down"></i>
                <span class="badge badge-info location"><?php echo $dev['location']; ?></span>
            </div>
            <hr>
            <div class="value"><span class="slabel"><?php echo Yii::t('app', 'Value 1'); ?> : </span><div class="val1 label label-important"><?php echo $dev['val1']; ?></div></div>
            <div class="value showAllVal"><span class="slabel"><?php echo Yii::t('app', 'Value 2'); ?> : </span><div class="val2 label label-important"><?php echo $dev['val2']; ?></div></div>
            <div class="value showAllVal"><span class="slabel"><?php echo Yii::t('app', 'Value 3'); ?> : </span><div class="val3 label label-important"><?php echo $dev['val3']; ?></div></div>
            <div class="value showAllVal"><span class="slabel"><?php echo Yii::t('app', 'Value 4'); ?> : </span><div class="val4 label label-important"><?php echo $dev['val4']; ?></div></div>
            <div class="value"><span class="slabel"><?php echo Yii::t('app', 'Last Seen'); ?> : </span><div class="lastchanged label label-info"><?php echo $dev['lastchanged']; ?></div></div>
            <div class="commands text-center"><?php echo $dev['commands']; ?></div>
        </div>
    <?php endforeach; ?>
</div>
<div style="text-align:center;margin:0px;" class="lastChanged"></div>
<script>
    var maxdate = '<?php echo $maxdate; ?>';
    var updateOK = true;
    var reloading = false;
    function formatPage() {
        var datestr = maxdate.split(' ')[0];
        $('div.lastchanged:contains(' + maxdate + ')').each(function(i, v) {
            $(v).parents('div.device').addClass('newdata');
            $(v).removeClass('label-info').addClass('label-inverse');
        });
        $('div.lastchanged:contains(' + datestr + ')').each(function(i, v) {
            var tmp = $(v).html();
            $(v).html(tmp.replace(datestr, ''));
        });
        $('.device .val1').each(function(i, v) {
//            console.log($(v).text());
            if ($(v).text() === 'On' || $(v).text().substring(0, 3) === 'Dim') {
                $(v).addClass('label-success').removeClass('label-important');
                $(v).parents('.device').find('.deviceName').addClass('label-success').removeClass('label-info');
                $(v).parents('.device').find('.location').addClass('badge-success').removeClass('badge-info');
                $(v).parents('.device').addClass('deviceOn');
            } else
                $(v).parents('.device').addClass('deviceOff');
        });
        $('.showDeviceOn').hover(function() {
            $('.deviceOff').animate({opacity: 0.25}, 1000)
        }, function() {
            $('.deviceOff').animate({opacity: 1}, 1000)
        });
        $('.showDeviceOff').hover(function() {
            $('.deviceOn').animate({opacity: 0.25}, 1000)
        }, function() {
            $('.deviceOn').animate({opacity: 1}, 1000)
        });
    }

    function fullScreen(tmp) {
        var delay = (typeof tmp == 'undefined') ? 1000 : tmp;
        if ($('div.row-fluid > div.spaanold10').length === 0) {
            $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/updateSession', {fullScreen: 1});
            $('div.row-fluid > div.span10').removeClass('span10').addClass('spaanold10');
            $('div.navbar').hide(delay);
            $('ul.breadcrumb').hide(delay);
            $('div#sidebar').hide(delay);
        } else {
            $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/updateSession', {fullScreen: 0});
            $('div.row-fluid > div.spaanold10').addClass('span10').removeClass('spaanold10');
            $('div.navbar').show(delay);
            $('ul.breadcrumb').show(delay);
            $('div#sidebar').show(delay);
        }
    }

    $(document).ready(go());
    function go() {
        formatPage();
        initSliders();
        needRefresh();
        $('.showValues').on('click', function() {
            if ($(this).hasClass('icon-chevron-down')) {
                $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/updateSession', {allValues: 1});
                $('.showAllVal').show(1000);
                $('.device').animate({height: '205px'}, 1000);
                $('.showValues').removeClass('icon-chevron-down').addClass('icon-chevron-up');
            } else {
                $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/updateSession', {allValues: 0});
                $('.showAllVal').hide(1000);
                $('.device').animate({height: '125px'}, 1000);
                $('.showValues').removeClass('icon-chevron-up').addClass('icon-chevron-down');
            }

        });
<?php if (isset(yii::app()->session['fullScreen'])): ?>
            fullScreen(0);
<?php endif; ?>

<?php if (isset(yii::app()->session['allValues'])): ?>
            $('.showValues').first().trigger('click');
<?php endif; ?>
    }

    function needRefresh() {
        if (maxdate !== '' && updateOK)
            $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/lastChanged' + $('ul.nav-tabs li.active a').attr('href'), function(data) {
                if (data != null) {
                    $('.lastChanged').html('<b>Last change on server</b> : ' + data + ' - <b>Last change here</b> : ' + maxdate);
                    if (maxdate != data) {
                        updateOK = false;
                        location.reload();
                        reloading = true;
                    }
                }
            });
<?php if (is_null(yii::app()->request->getParam('debug'))): ?>
            if (!reloading)
                setTimeout('needRefresh()', 2000);
<?php endif; ?>
    }

    function btAction(event, but) {
        event.stopPropagation();
        $(but).removeClass('btn-primary').addClass('btn-default');
        var device = $(but).data('device');
        var action = $(but).data('action');
        $.get('<?php echo Yii::app()->request->baseUrl; ?>/AjaxUtil/setDevice', {device: device, action: action},
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
                    $('button').attr('disabled', 'disabled');
                    updateOK = false;
                    location.reload();
                } else
                    $('.lastChanged').html('DO');
            }, 'json').fail(function() {
                $('.lastChanged').html('DF');
            });
        }).on('slide', function(ev) {
            $(this).parents('div.device').find('div.val1').text(ev.value);
        });
    }
</script>
