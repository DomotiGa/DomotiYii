<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Control'),
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
$this->widget('bootstrap.widgets.TbNav', array(
    'type' => 'tabs',
    'stacked' => false,
    'items' => array(
        array('label' => Yii::t('app', 'Control'), 'url' => '?type=control', 'active' => Yii::app()->request->getParam('type', 'control') == 'control'),
        array('label' => Yii::t('app', 'All'), 'url' => '?type=all', 'active' => Yii::app()->request->getParam('type', 'control') == 'all'),
        array('label' => Yii::t('app', 'Sensors'), 'url' => '?type=sensors', 'active' => Yii::app()->request->getParam('type', 'control') == 'sensors'),
    ),
));
?>
<div class="row-fluid">
    <?php foreach ($data as $dev): ?>
        <?php if ($maxdate < $dev['lastchanged']) $maxdate = $dev['lastchanged']; ?>
        <div class="device text-left">
            <div class="id"><?php echo $dev['id']; ?></div>
            <div class="icon">
                <?php echo $dev['icon']; ?>&nbsp;<span class="label label-info"><?php echo $dev['name']; ?></span>
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
    function formatDate() {
        var datestr = maxdate.split(' ')[0];
        $('div.lastchanged:contains(' + maxdate + ')').each(function(i, v) {
            $(v).parents('div.device').addClass('newdata');
            $(v).removeClass('label-info').addClass('label-inverse');
        });
        $('div.lastchanged:contains(' + datestr + ')').each(function(i, v) {
            var tmp = $(v).html();
            $(v).html(tmp.replace(datestr, ''));
        });
    }
    $(document).ready(go());
    function go() {
        formatDate();
        initSliders();
            needRefresh();
        $('.showValues').on('click', function() {
            if ($(this).hasClass('icon-chevron-down')) {
                $.get('updateSession', {allValues: 1});
                $('.showAllVal').show(1000);
                $('.device').animate({height: '205px'}, 1000);
                $('.showValues').removeClass('icon-chevron-down').addClass('icon-chevron-up');
            } else {
                $.get('updateSession', {allValues: 0});
                $('.showAllVal').hide(1000);
                $('.device').animate({height: '125px'}, 1000);
                $('.showValues').removeClass('icon-chevron-up').addClass('icon-chevron-down');
            }
        });
<?php if (isset(yii::app()->session['allValues'])): ?>
            $('.showValues').first().trigger('click');
<?php endif; ?>
    }

    function needRefresh() {
        if (maxdate !== '' && updateOK)
            $.get('<?php echo Yii::app()->homeUrl; ?>control/lastChanged'+ $('ul.nav-tabs li.active a').attr('href'), function(data) {
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
        $.get('<?php echo Yii::app()->homeUrl; ?>control/setDevice', {device: device, action: action},
        function(data) {
            if (data.result) {
                $('button').attr('disabled', 'disabled');
                updateOK = false;
                location.reload();
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
                    $('button').attr('disabled', 'disabled');
                    updateOK = false;
                    location.reload();
                } else
                    alert('Error');
            }, 'json').fail(function() {
                alert('Error setting device!!');
            });
        }).on('slide', function(ev) {
            $(this).parents('div.device').find('div.val1').text(ev.value);
        });
    }
</script>
