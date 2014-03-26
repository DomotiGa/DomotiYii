<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */


$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Devices CMD') . ' Experimental page - other layout',
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
        min-width: 200px;
        height: 210px;  
        background-color:#C9E0ED;
    }
    .device .id {
        display:none;

    }
    .device span {
        margin: 3px 0px 3px 0px;
    }
    .device .name {
        margin-left:10px;
    }
    .btn-mini {
        height: 20px;
        width:50px;
    }
</style>
<div class="row-fluid">
    <?php foreach ($data as $rows): ?>
        <div class="device text-center">
            <?php
            $pref = array('name', 'commands', 'location', 'val1', 'val2', 'val3', 'val4');
            foreach ($rows as $i => $c) {
                if ($i == 'lastchanged') {
                    if ($maxdate < $c)
                        $maxdate = $c;
                }
                echo '<span class="', $i, '">', $c, '</span>';
                if (in_array($i, $pref))
                    echo '<br>';
            }
            ?>
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
        $('span.lastchanged:contains(' + maxdate + ')').each(function(i, v) {
            $(v).addClass('newdata');
        });
        $('span.lastchanged:contains(' + datestr + ')').each(function(i, v) {
            var tmp = $(v).html();
            $(v).html(tmp.replace(datestr, ''));
        });
    }
    $(document).ready(go());
    function go() {
        $('.name').addClass('label label-info');

        $('.location').addClass('label label-success');
        $('.val1, .val2, .val3, .val4').addClass('label label-important');
        formatDate();
        $('.lastchanged').addClass('label label-info');
        $('.newdata').removeClass('label-info').addClass('label-warning');
        initSliders();
        needRefresh();
    }

    function needRefresh() {
        if (maxdate !== '' && updateOK)
            $.get('<?php echo Yii::app()->homeUrl; ?>cmd/lastChanged', function(data) {
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
        $(but).removeClass('btn-primary');
        var device = $(but).data('device');
        var action = $(but).data('action');
        $.get('<?php echo Yii::app()->homeUrl; ?>cmd/setDevice', {device: device, action: action},
        function(data) {
            if (data.result) {
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
            $.get('<?php echo Yii::app()->homeUrl; ?>cmd/setDevice', {device: device, action: action},
            function(data) {
                if (data.result) {
                    updateOK = false;
                    location.reload();
                } else
                    alert('Error');
            }, 'json').fail(function() {
                alert('Error setting device!!');
            });
        }).on('slide', function(ev) {
            $(this).parents('div.device').find('span.val1').text(ev.value);
        });
        $('.slider-container').on('mouseover', function() {
            $(this).css('background-color', 'lightblue');
            updateOK = false;
        }).on('mouseout', function() {
            $(this).css('background-color', '');
            updateOK = true;
        })
        $('.slider-horizontal').css('width', '180px').css('margin-top','-5px');
        $('.slider-container').css('margin-right', '10px').parents('span.commands')/*.css('display', 'inline-flex')*/.css('margin-bottom', '1px').css('margin-top', '-2px').css('margin-left', '10px');
        //$('.slider-container').parents('spaan.commands').next('br').remove();
    }
</script>
