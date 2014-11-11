<?php
// Highcharts js scripts
$pathHighCharts = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.components.assets.highcharts'));

// Get client script
$cs=Yii::app()->clientScript;
		
// Add HighCHarts JS
$cs->registerScriptFile($pathHighCharts .'/highstock.js', CClientScript::POS_BEGIN);
$cs->registerScriptFile($pathHighCharts .'/highcharts-more.js', CClientScript::POS_BEGIN);
$cs->registerScriptFile($pathHighCharts .'/modules/exporting.js', CClientScript::POS_BEGIN);

$type = Yii::app()->request->getParam('type', 'Dashboard');
$location = Yii::app()->request->getParam('location', 'All');

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Graphs'),
    ),
));
$maxdate = '';

// below variables for the charts
$chartname = '';
$chartvalue = array();
?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/jquery-ui.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.4.js"></script>

<script type="text/javascript">

var fromDatepicker = $.cookie("fromDatepicker");
if (!fromDatepicker) {
	$.cookie("fromDatepicker", "<?php echo date('d-m-Y', strtotime("-6 months")); ?>");
	fromDatepicker = "<?php echo date('d-m-Y', strtotime("-6 months")); ?>";
}

var toDatepicker = $.cookie("toDatepicker");
if (!toDatepicker) {
	$.cookie("toDatepicker", "<?php echo date('d-m-Y'); ?>");
	toDatepicker = "<?php echo date('d-m-Y'); ?>";
} else {
	$.cookie("toDatepicker", "<?php echo date('d-m-Y'); ?>");
	toDatepicker = "<?php echo date('d-m-Y'); ?>";
}

$(document).ready(function () {
  $(function() {
    $( "#from" ).datepicker({
      dateFormat: "dd-mm-yy",
      showAnim: "slideDown",	  
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
		$.cookie("fromDatepicker", selectedDate);
      }
    });
    $( "#to" ).datepicker({
      dateFormat: "dd-mm-yy",
      showAnim: "slideDown",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
		$.cookie("toDatepicker", selectedDate);
      }
    });

$('#from').datepicker('setDate', fromDatepicker);
$('#to').datepicker('setDate', toDatepicker);
  });

$('#refresh-btn').click(function() {
    location.reload();
});

});
</script>
<?php
// Type is dashboard
if ( (isset($_GET['type']) && $_GET['type'] == 'Dashboard') OR $type == 'Dashboard') {
?>
<script type="text/javascript">
$(document).ready(function () {
	// Loop through every chart checkbox and set a cookie
	$("input.box").each(function() {
		var mycookie = $.cookie($(this).attr('name'));
		if (mycookie && mycookie == "true") {
			$(this).prop('checked', mycookie);
		} else {
			// If no cookie found then we create it.
			$.cookie($(this).attr("name"), $(this).prop('checked'), {
				path: '/',
				expires: 365
			});
		}
	});
	
	// When checkbox changes we write the cookie and hide or show the chart.
	$("input.box").change(function() {
		$.cookie($(this).attr("name"), $(this).prop('checked'), {
			path: '/',
			expires: 365
		});
		if ( $.cookie($(this).attr('name')) == "true" ) {
			$('div[name='+ $(this).attr('name') +']').show();
		} else {
			$('div[name='+ $(this).attr('name') +']').hide();
		}		
	});

	// Show the div with checkboxes
	$('button.btn').click(function() {
			$('.device_charts').slideToggle("fast");
	});

	// Loop through the chartbox divs!
	$(".chartbox").each(function() {
		var checkCookie = $.cookie($(this).attr('name'));
		if ( checkCookie ) {
			if ( $.cookie($(this).attr('name')) == "true" ) {
					$('div[name='+ $(this).attr('name') +']').show();
				} else {
					$('div[name='+ $(this).attr('name') +']').hide();
				}
		} else {
			alert('Geen cookie: ' + $(this).attr('name'));
		}
	});

});
</script>
<?php
} // end if type dashboard

$lstLocation = array(array('label' => Yii::t('app', 'All'), 'url' => '?type=' . $type . '&location=All'));
foreach (Locations::model()->used()->findAll(array('order' => 't.name')) as $l) {
    array_push($lstLocation, array('label' => $l->name, 'url' => '?type=' . $type . '&location=' . $l->name));
}
$this->widget('bootstrap.widgets.TbNav', array(
    'type' => 'tabs',
    'stacked' => false,
    'items' => array(
        array('label' => Yii::t('app', 'Type') . ' : ' . Yii::t('app', $type), 'items' => array(
		array('label' => Yii::t('app', 'Dashboard'), 'url' => '?type=Dashboard&location=' . $location, 'active' => $type == 'Dashboard'),
                array('label' => Yii::t('app', 'All'), 'url' => '?type=All&location=' . $location, 'active' => $type == 'All'),
		array('label' => Yii::t('app', 'Control'), 'url' => '?type=Control&location=' . $location, 'active' => $type == 'Control'),
                array('label' => Yii::t('app', 'Sensors'), 'url' => '?type=Sensors&location=' . $location, 'active' => $type == 'Sensors'))),
		array('label' => Yii::t('app', 'Location') . ' : ' . Yii::t('app', $location), 'items' => $lstLocation),
    ),
));

// Because we dont have a direct link, we put the device filters for type and location in the where of the devicevalues table.
$device_q = "SELECT d.id FROM devices d";

if ( (isset($_GET['type']) && $_GET['type'] == 'Control') OR $type == 'Control') {
	$where_control = " where (d.switchable = -1 OR d.dimable = -1)";
} elseif ( (isset($_GET['type']) && $_GET['type'] == 'Sensors') OR $type == 'Sensors') {
	$where_control = " where d.switchable = 0 AND d.dimable = 0";
} else {
	$where_control = null;
}

if ( (isset($_GET['location']) && $_GET['location'] <> 'All') ) {
	$locs = $this->getLocation($_GET['location']);
	foreach($locs as $item){
		$where_location = " d.location = " . $item;
	}
} else {
	$where_location = null;
}
// create the where part
if (is_null($where_control) && !is_null($where_location)) {
	$device_q = $device_q . ' WHERE ' . $where_location;
} elseif(!is_null($where_control) && is_null($where_location)) {
	$device_q = $device_q . $where_control;
} elseif(!is_null($where_control) && !is_null($where_location)) {
	$device_q = $device_q . $where_control .' AND '. $where_location;
} else {
	$device_q = $device_q;
}
// 

// Only show enabled graphs!
$graph_criteria = new CDbCriteria();
$graph_criteria->condition = 'enabled=-1';
	
// Type is dashboard
if ( (isset($_GET['type']) && $_GET['type'] == 'Dashboard') OR $type == 'Dashboard') {
?>

<div id="showmenu"><?php echo TbHtml::button('Set dashboard', array('toggle' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL)); ?></div>
<div class="device_charts"  style="display: none; border:1px solid black; margin:5px 5px 5px 5px;">
<p>
<table border=1>

<?php

	
// Get list of YiiGraphs
//$yiiGraphs = $this->getYiiGraphs();
foreach (YiiGraphs::model()->findAll($graph_criteria) as $G) {
	//print 'id: '. $G->id .'<br/>';
	//print 'naam: '. $G->name .'<br/>';
	//print 'type: '. $G->type .'<br/>';
	//print 'device_value_01: '. $G->device_value_01 .'<br/>';
	
	////////////////////////////
	//Chart types:
	// 0 = none
	// 1 = Barchart
	// 2 = Linechart
	// 3 = Gauge
	/////////////////////////////
	
	$criteria = new CDbCriteria();
	$criteria->condition = 'id='.$G->device_value_01;
	// DeviceValues loop
	foreach (DeviceValues::model()->findAll($criteria) as $l) {
	 //print '<!-- valuenum: '. $l->valuenum .'-->';
?>
<tr><td>
<label class="checkbox"><input class="box" type="checkbox" name="<?php echo  $G->id; ?>" id="<?php echo $l->device_id .'_'. $G->name . '_' .$l->valuenum ; ?>" /><?php echo $G->name . ' (value: '. $l->valuenum . ')'; ?></label>
</td></tr>
<?php
	}
}
?>
</table>
</p>
<p><b>
Set a date range to get the log data.
</b></p>
<table border=1>
<tr>
<td>
<label for="from">From</label>
</td><td>
<input type="text" id="from" name="from">
</td>
<tr>
<td width="40px">
<label for="to">to</label>
</td><td>
<input type="text" id="to" name="to" >
</td>
</tr>
</table>
<div id="refresh-btn"><?php echo TbHtml::button('Refresh graphs', array('toggle' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_MINI)); ?></div>
<p>
<b><?php echo Yii::t('app','Supported graph types:') ?></b><br>
<b><?php echo Yii::t('app','Barchart :') ?></b> <?php echo Yii::t('app','Displays a graph (only bars) when values of the device are logged. It shows a count of the values over time.') ?><br>
<b><?php echo Yii::t('app','Gauge :') ?></b> <?php echo Yii::t('app','Displays a gauge when values of the device are logged. It shows the last logged value.') ?> <br>
<b><?php echo Yii::t('app','Linechart :') ?></b> <?php echo Yii::t('app','Displays a line graph when values of the device are logged. It shows all logged values over time.') ?>  <br><br>
<?php echo Yii::t('app','It is mandatory to enable the log option on a device value!') ?><br/>
<?php echo Yii::t('app','It is mandatory to set a unit on a device value!') ?>
<br/>
</p>
</div>

<?php
} // end if type dashboard
?>

<script type='text/javascript'>//<![CDATA[
$( function() {

<?php
//*****************************************************************************************************************
foreach (YiiGraphs::model()->findAll($graph_criteria) as $G) {
	//print 'id: '. $G->id .'<br/>';
	//print 'naam: '. $G->name .'<br/>';
	//print 'type: '. $G->type .'<br/>';
	//print 'device_value_01: '. $G->device_value_01 .'<br/>';
	
	////////////////////////////
	//Chart types:
	// 0 = none
	// 1 = Barchart
	// 2 = Linechart
	// 3 = Gauge
	/////////////////////////////

	$criteria = new CDbCriteria();
	$criteria->condition = 'id='.$G->device_value_01 . ' AND device_id in ('. $device_q .')';

// DeviceValues loop
foreach (DeviceValues::model()->findAll($criteria) as $l) {
 //print '<!-- valuenum: '. $l->valuenum .'-->';
 //print '<!-- units: '. $l->units .'-->';
 //print '<!-- valuerrdtype: '. $l->valuerrdtype .'-->';
 //print '<!-- valuerrddsname: '. $l->valuerrddsname .'-->';
 //print '<!-- device_id: '. $l->device_id .'-->';

// The GAUGE is only tested with a temp sensor ... dont know if it will work for other kind of sensors too....??	 
if ( $G->type == 3 && $l->units != null && $G->name != null) {

// For the gauge we get the last value logged in the deviceValuesLog table
$criteriaDVL = new CDbCriteria();
$criteriaDVL->condition = 'id = (SELECT max(dvl.id) FROM device_values_log dvl where dvl.device_id = '. $l->device_id .' and dvl.valuenum = '. $l->valuenum .' )';
foreach (DeviceValuesLog::model()->findAll($criteriaDVL) as $dvl) {
	//print '<!-- DVL value: '. str_replace(",", ".", $dvl->value) .'-->'; // we dont want a comma but a point ... is this realy needed??
	$gauge_value = str_replace(",", ".", $dvl->value);
}
if (!isset($gauge_value)) {
	$gauge_value = 0;
} else {
	$gauge_value = is_null($gauge_value) ? 0 : $gauge_value; // check is null!?
}
?>
<!-- ********* GAUGE ********* -->

    $('#container_gauge_<?php echo $G->id; ?>').highcharts({
	
	    chart: {
	        type: 'gauge',
	        plotBackgroundColor: null,
	        plotBackgroundImage: null,
	        plotBorderWidth: 0,
	        plotShadow: false
	    },
	    
	    title: {
	        text: <?php echo "'". $G->name ."'"; ?>
	    },
	    
	    pane: {
	        startAngle: -150,
	        endAngle: 150,
	        background: [{
	            backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#FFF'],
	                    [1, '#333']
	                ]
	            },
	            borderWidth: 0,
	            outerRadius: '109%'
	        }, {
	            backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#333'],
	                    [1, '#FFF']
	                ]
	            },
	            borderWidth: 1,
	            outerRadius: '107%'
	        }, {
	            // default background
	        }, {
	            backgroundColor: '#DDD',
	            borderWidth: 0,
	            outerRadius: '105%',
	            innerRadius: '103%'
	        }]
	    },
	       
	    // the value axis
	    yAxis: {
	        min: -25,
	        max: 50,
	        
	        minorTickInterval: 'auto',
	        minorTickWidth: 1,
	        minorTickLength: 10,
	        minorTickPosition: 'inside',
	        minorTickColor: '#666',
	
	        tickPixelInterval: 30,
	        tickWidth: 2,
	        tickPosition: 'inside',
	        tickLength: 10,
	        tickColor: '#666',
	        labels: {
	            step: 2,
	            rotation: 'auto'
	        },
	        title: {
	            text: <?php echo "' ". $l->units ."'"; ?>
	        },
	        plotBands: [{
	            from: 15,
	            to: 50,
	            color: '#55BF3B' // green
	        }, {
	            from: 0,
	            to: 15,
	            color: '#DDDF0D' // yellow
	        }, {
	            from: -25,
	            to: 0,
	            color: '#DF5353' // red
	        }]        
	    },
	
	    series: [{
	        name: ' ',
	        data: [<?php echo $gauge_value; ?>],
	        tooltip: {
	            valueSuffix: <?php echo "' ". $l->units ."'"; ?>
	        }
	    }]
	
	}
);

<?php
} // End gauge if

// this function gets all details to display the graphs
// Barchart = COUNTER = 1

if ( $G->type == 1 && $G->name != null) {

$chart_details = $this->getChartDetails($l->device_id, $l->valuenum, $G->type);
foreach($chart_details as $item){
	$row = $item['chartvalue'];
	
	$chartvalue[] = $row;
}

if (isset($chartvalue)) {
	$chartvalues = implode("','",$chartvalue);
} else {
	$chartvalue = '';
}

?>
<!-- -------------------------------------------------------------- -->
<!-- -------------------------------------------------------------- -->
var <?php echo 'seriesOptions_'. $G->id; ?> = [],
	yAxisOptions = [],
	<?php echo 'seriesCounter_'. $G->id; ?> = 0,
	<?php echo 'device_'. $G->id; ?> = <?php echo "['" . $chartvalues . "']" ?> ,
	colors = Highcharts.getOptions().colors;

$.each(<?php echo 'device_'. $G->id; ?>, function(<?php echo 'i_'. $G->id; ?>, <?php echo 'name_'. $G->id; ?>) {

	$.getJSON('<?php echo Yii::app()->request->baseUrl; ?>/Graphs/getGraphData?todate='+<?php echo 'toDatepicker'; ?>+'&fromdate='+<?php echo 'fromDatepicker'; ?>+'&device=<?php echo $l->device_id; ?>&dev_valnum=<?php echo $l->valuenum; ?>&chartname=<?php echo trim($chartname); ?>&charttype=<?php echo $l->valuerrdtype; ?>&chartval='+ <?php echo 'name_'. $G->id; ?> +'&callback=?',	function(data) {

		<?php echo 'seriesOptions_'. $G->id; ?>[<?php echo 'i_'. $G->id; ?>] = {
			type: 'column',
			name: <?php echo 'name_'. $G->id; ?>,
			data: data,
			dataGrouping: {
				units: [[
					'day', // unit name
					[1] // allowed multiples
				],
				[
					'week', // unit name
					[1] // allowed multiples
				], 
				[
					'month',
					[1]
				]]
			}
		};

		// As we're loading the data asynchronously, we don't know what order it will arrive. So
		// we keep a counter and create the chart when all the data is loaded.
		<?php echo 'seriesCounter_'. $G->id; ?>++;

		if (<?php echo 'seriesCounter_'. $G->id; ?> == <?php echo 'device_'. $G->id; ?>.length) {
			<?php echo 'createChart_'. $G->id .'();'?>
		}
	});
});

// create the chart when all data is loaded
function <?php echo 'createChart_'. $G->id .'()'?> {

	$('#container_<?php echo $G->id; ?>').highcharts('StockChart', {
		chart: {
		},
		title: {
			text: '<?php echo trim($G->name); ?>' // Title for the chart
		},
		
		legend: {
			align: 'right',
			enabled: true,
			layout: 'vertical',
			verticalAlign: 'top',
			y:50
		},

		rangeSelector: {
			inputEnabled: $('#container<?php echo $G->id; ?>').width() > 480,
			buttons: [{
				type: 'day',
				count: 1,
				text: '1d'
			}, {
				type: 'day',
				count: 3,
				text: '3d'
			}, {
				type: 'week',
				count: 1,
				text: '1w'
			}, {
				type: 'month',
				count: 1,
				text: '1m'
			}, {
				type: 'month',
				count: 3,
				text: '3m'
			}, {
				type: 'ytd',
				text: 'YTD'
			}, {
				type: 'year',
				count: 1,
				text: '1y'
			}, {
				type: 'all',
				text: 'All'
			}],
			 selected: 0,
		},

		yAxis: {
			labels: {
				formatter: function() {
					return (this.value > 0 ? '+' : '') + this.value; //+ '%';
				}
			},
			plotLines: [{
				value: 0,
				width: 2,
				color: 'silver'
			}]
		},
		
		//plotOptions: {
		//	series: {
		//		compare: 'percent'
		//	}
		//},
		
		tooltip: {
			pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',
			valueDecimals: 0
		},
		
		series: <?php echo 'seriesOptions_'. $G->id; ?>
	});
}
<?php
	} // array countchart_details
	//////////////////////////////////////////////////////////////////////////////////////
	} // end DeviceValues loop
$chartvalue = '';
} // YiiGraphs

$prev_valuerrddname = null;
//*****************************************************************************************************************
foreach (YiiGraphs::model()->findAll($graph_criteria) as $G) {
	//print 'id: '. $G->id .'<br/>';
	//print 'naam: '. $G->name .'<br/>';
	//print 'type: '. $G->type .'<br/>';
	//print 'device_value_01: '. $G->device_value_01 .'<br/>';
	
	////////////////////////////
	//Chart types:
	// 0 = none
	// 1 = Barchart
	// 2 = Linechart
	// 3 = Gauge
	/////////////////////////////

	$criteria = new CDbCriteria();
	$criteria->condition = 'id='.$G->device_value_01 . ' AND device_id in ('. $device_q .')';

// DeviceValues loop
foreach (DeviceValues::model()->findAll($criteria) as $l) {
 //print '<!-- valuenum: '. $l->valuenum .'-->';
 //print '<!-- units: '. $l->units .'-->';
 //print '<!-- valuerrdtype: '. $l->valuerrdtype .'-->';
 //print '<!-- valuerrddsname: '. $l->valuerrddsname .'-->';
 //print '<!-- device_id: '. $l->device_id .'-->';	
	//Linechart
	if ( $G->type == 2 && $G->name != null && $l->units != null) {
?>
<!-- -------------------------------------------------------------- -->
	var <?php echo 'seriesOptions_'. $G->id; ?> = [],
		yAxisOptions = [],
		<?php echo 'seriesCounter_'. $G->id; ?> = 0,
		<?php echo 'device_'. $G->id; ?> = <?php echo "['" . $l->units . "']" ?> ,
		colors = Highcharts.getOptions().colors;

	$.each(<?php echo 'device_'. $G->id; ?>, function(<?php echo 'i_'. $G->id; ?>, <?php echo 'name_'. $G->id; ?>) {

		$.getJSON('<?php echo Yii::app()->request->baseUrl; ?>/Graphs/getGraphData?todate='+<?php echo 'toDatepicker'; ?>+'&fromdate='+<?php echo 'fromDatepicker'; ?>+'&device=<?php echo $l->device_id; ?>&dev_valnum=<?php echo $l->valuenum; ?>&chartname=<?php echo $G->name; ?>&charttype=<?php echo $G->type; ?>&chartval='+ <?php echo 'name_'. $G->id; ?> +'&callback=?',	function(data) {

			<?php echo 'seriesOptions_'. $G->id; ?>[<?php echo 'i_'. $G->id; ?>] = {
				name: <?php echo 'name_'. $G->id; ?>,
				data: data,
				dataGrouping: {
					units: [[
						'day', // unit name
						[1] // allowed multiples
					],
					[
						'week', // unit name
						[1] // allowed multiples
					], 
					[
						'month',
						[1]
					]]
		        }
			};

			// As we're loading the data asynchronously, we don't know what order it will arrive. So
			// we keep a counter and create the chart when all the data is loaded.
			<?php echo 'seriesCounter_'. $G->id; ?>++;

			if (<?php echo 'seriesCounter_'. $G->id; ?> == <?php echo 'device_'. $G->id; ?>.length) {
				<?php echo 'createChart_'. $G->id .'();'?>
			}
		});
	});

	// create the chart when all data is loaded
	function <?php echo 'createChart_'. $G->id .'()'?> {

		$('#container_<?php echo $G->id; ?>').highcharts('StockChart', {
		    chart: {
		    },
			title: {
				text: '<?php echo $G->name; ?>' // Title for the chart
			},
			
			legend: {
				align: 'right',
				enabled: true,
				layout: 'vertical',
				verticalAlign: 'top',
				y:50
			},

		    rangeSelector: {
				inputEnabled: $('#container<?php echo $G->id; ?>').width() > 480,
				buttons: [{
					type: 'day',
					count: 1,
					text: '1d'
				}, {
					type: 'day',
					count: 3,
					text: '3d'
				}, {
					type: 'week',
					count: 1,
					text: '1w'
				}, {
					type: 'month',
					count: 1,
					text: '1m'
				}, {
					type: 'month',
					count: 3,
					text: '3m'
				}, {
					type: 'ytd',
					text: 'YTD'
				}, {
					type: 'year',
					count: 1,
					text: '1y'
				}, {
					type: 'all',
					text: 'All'
				}],
				 selected: 0,
		    },

		    yAxis: {
		    	labels: {
		    		formatter: function() {
		    			return (this.value > 0 ? '+' : '') + this.value; //+ '%';
		    		}
		    	},
		    	plotLines: [{
		    		value: 0,
		    		width: 2,
		    		color: 'silver'
		    	}]
		    },
		    
		    //plotOptions: {
		    //	series: {
		    //		compare: 'percent'
		    //	}
		    //},
		    
		    tooltip: {
		    	pointFormat: '<b>{point.y}</b> <span style="color:{series.color}">{series.name}</span><br/>',
		    	valueDecimals: 0
		    },
		    
		    series: <?php echo 'seriesOptions_'. $G->id; ?>
		});
	}
<!-- -------------------------------------------------------------- -->
	
<?php 
	} // array linechart_details
	} // end DeviceValues loop
$chartvalue = '';
} // YiiGraphs
?>
});
//]]>
</script>

<?php 
	$gaugeCounter = 1;
	$gaugeRow = 1;
	$gaugeColumn = 1;

foreach (YiiGraphs::model()->findAll($graph_criteria) as $G) {
	//print 'id: '. $G->id .'<br/>';
	//print 'naam: '. $G->name .'<br/>';
	//print 'type: '. $G->type .'<br/>';
	//print 'device_value_01: '. $G->device_value_01 .'<br/>';
	
	////////////////////////////
	//Chart types:
	// 0 = none
	// 1 = Barchart
	// 2 = Linechart
	// 3 = Gauge
	/////////////////////////////
	
		$criteria = new CDbCriteria();
		$criteria->condition = 'id='.$G->device_value_01 . ' AND device_id in ('. $device_q .')';
		// DeviceValues loop
		foreach (DeviceValues::model()->findAll($criteria) as $l) {
		 //print '<!-- valuenum: '. $l->valuenum .'-->';
		 //print '<!-- units: '. $l->units .'-->';
		 //print '<!-- valuerrdtype: '. $l->valuerrdtype .'-->';
		 //print '<!-- valuerrddsname: '. $l->valuerrddsname .'-->';
	
	// start if GAUGE
	if ( $G->type == 3 && $l->units != null) {
	if ($gaugeCounter % 2 == 0) {
		$gaugeRow++;
		$gaugeColumn = 1;
	} elseif ($gaugeCounter == 1) {
		$gaugeColumn = 1;
	} else {
		$gaugeColumn = 2;
		echo "<div class='clear' style='clear:both;' ></div>";
	}
?>
		<div class="chartbox" id="container_gauge_<?php echo $G->id; ?>" name="<?php echo $G->id; ?>" style="float: left; border:1px solid black; height: 300px; width: 250px; margin:5px 5px 5px 5px;"></div>
<?php
	$gaugeCounter++;
	} //end if gauge 
	} // end DeviceValues loop
}//YiiGraphs
?>
<div class='clear' style='clear:both;' ></div>
<?php 
foreach (YiiGraphs::model()->findAll($graph_criteria) as $G) {
	//print 'id: '. $G->id .' - ';
	//print 'naam: '. $G->name .' - ';
	//print 'type: '. $G->type .'<br/>';
	//print 'device_value_01: '. $G->device_value_01 .'<br/>';
	
	////////////////////////////
	//Chart types:
	// 0 = none
	// 1 = Barchart
	// 2 = Linechart
	// 3 = Gauge
	/////////////////////////////
	
		$criteria = new CDbCriteria();
		$criteria->condition = 'id='.$G->device_value_01 . ' AND device_id in ('. $device_q .')';
		// DeviceValues loop
		foreach (DeviceValues::model()->findAll($criteria) as $l) {
			if ( $G->type == 1 ) {
				$chart_details = $this->getChartDetails($l->device_id, $l->valuenum, $G->type);
			} else {
				$chart_details = null;
			}
			//var_dump($chart_details);
	// start if COUNTER
	if ( count( $chart_details) > 0 && $G->type == 1) {
?>
	<div class="chartbox" id="container_<?php echo $G->id; ?>" name="<?php echo $G->id; ?>" style="height: 400px; min-width: 310px; border:1px solid black; margin:5px 5px 5px 5px;"></div>
<?php
	} //end if counter
	} // end DeviceValues loop
}//YiiGraphs
?>

<?php 
	$prev_valuerrddname = null;
foreach (YiiGraphs::model()->findAll($graph_criteria) as $G) {
	//print 'id: '. $G->id .'<br/>';
	//print 'naam: '. $G->name .'<br/>';
	//print 'type: '. $G->type .'<br/>';
	//print 'device_value_01: '. $G->device_value_01 .'<br/>';
	
	////////////////////////////
	//Chart types:
	// 0 = none
	// 1 = Barchart
	// 2 = Linechart
	// 3 = Gauge
	/////////////////////////////
	
		$criteria = new CDbCriteria();
		$criteria->condition = 'id='.$G->device_value_01 . ' AND device_id in ('. $device_q .')';
		// DeviceValues loop
		foreach (DeviceValues::model()->findAll($criteria) as $l) {

	// start if DERIVE
	if ( $G->type == 2 && $G->name != null && $l->units != null) {
?>
	<div class="chartbox" id="container_<?php echo $G->id; ?>" name="<?php echo $G->id; ?>" style="height: 400px; min-width: 310px; border:1px solid black; margin:5px 5px 5px 5px;"></div>
<?php
	$prev_valuerrddname = $G->name;
	} //end if line
	} // end DeviceValues loop
}//YiiGraphs
?>


