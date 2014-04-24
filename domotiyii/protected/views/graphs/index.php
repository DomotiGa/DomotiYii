<?php
$type = Yii::app()->request->getParam('type', 'Control');
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
//
?>

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
// 


/* 
Below we first create a javascript block for all the highcharts. 
Loop through all devices and create a seperate javascript function for it to display the graph.
*/
?>

<script type='text/javascript'>//<![CDATA[
$( function() {

<?php foreach ($data as $dev): 
	//echo $dev['id']; 
	echo '<!--'. $dev['name'] .'-->';
	$criteria = new CDbCriteria();
	$criteria->condition = 'device_id='.$dev['id'];

	// DeviceValues loop
	foreach (DeviceValues::model()->findAll($criteria) as $l) {
	 print '<!-- valuenum: '. $l->valuenum .'-->';
	 print '<!-- units: '. $l->units .'-->';
	 print '<!-- valuerrdtype: '. $l->valuerrdtype .'-->';
	 print '<!-- valuerrddsname: '. $l->valuerrddsname .'-->';

// The GAUGE is only tested with a temp sensor ... dont know if it will work for other kind of sensors too....??	 
if ( $l->valuerrdtype == 'GAUGE' && $l->units != null && $l->valuerrddsname != null) {

// For the gauge we get the last value logged in the deviceValuesLog table
$criteriaDVL = new CDbCriteria();
$criteriaDVL->condition = 'id = (SELECT max(dvl.id) FROM device_values_log dvl where dvl.device_id = '.$dev['id'] .' and dvl.valuenum = '. $l->valuenum .' )';
foreach (DeviceValuesLog::model()->findAll($criteriaDVL) as $dvl) {
	print '<!-- DVL value: '. str_replace(",", ".", $dvl->value) .'-->'; // we dont want a comma but a point ... is this realy needed??
	$gauge_value = str_replace(",", ".", $dvl->value);
}
$gauge_value = is_null($gauge_value) ? 0 : $gauge_value; // check is null!?
?>

<!-- ********* GAUGE ********* -->
    $('#container_gauge_<?php echo $dev['id'] ."_". $l->valuenum; ?>').highcharts({
	
	    chart: {
	        type: 'gauge',
	        plotBackgroundColor: null,
	        plotBackgroundImage: null,
	        plotBorderWidth: 0,
	        plotShadow: false
	    },
	    
	    title: {
	        text: <?php echo "'". $l->valuerrddsname ."'"; ?>
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
	$chart_details = $this->getChartDetails($dev['id'], $l->valuenum, $l->valuerrdtype);

	if ( count( $chart_details) > 0 && $l->valuerrdtype == 'COUNTER' && $l->valuerrddsname != null) {
		foreach($chart_details as $item){
			$chartname = $item['chartname']; // not needed anymore
			$row = $item['chartvalue'];
			
			$chartvalue[] = $row;
		}
		$chartvalues = implode("','",$chartvalue);
		//echo "'" . $chartvalues . "'";

	?>
<!-- -------------------------------------------------------------- -->
<!-- -------------------------------------------------------------- -->
	var <?php echo 'seriesOptions_'.$dev['id'] ."_". $l->valuenum; ?> = [],
		yAxisOptions = [],
		<?php echo 'seriesCounter_'.$dev['id'] ."_". $l->valuenum; ?> = 0,
		<?php echo 'device_'.$dev['id'] ."_". $l->valuenum; ?> = <?php echo "['" . $chartvalues . "']" ?> ,
		colors = Highcharts.getOptions().colors;

	$.each(<?php echo 'device_'.$dev['id'] ."_". $l->valuenum; ?>, function(<?php echo 'i_'.$dev['id'] ."_". $l->valuenum; ?>, <?php echo 'name_'.$dev['id'] ."_". $l->valuenum; ?>) {

		$.getJSON('<?php echo Yii::app()->request->baseUrl; ?>/Graphs/getGraphData?device=<?php echo $dev['id']; ?>&dev_valnum=<?php echo $l->valuenum; ?>&chartname=<?php echo trim($chartname); ?>&chartval='+ <?php echo 'name_'.$dev['id'] ."_". $l->valuenum; ?> +'&callback=?',	function(data) {

			<?php echo 'seriesOptions_'.$dev['id'] ."_". $l->valuenum; ?>[<?php echo 'i_'.$dev['id'] ."_". $l->valuenum; ?>] = {
				type: 'column',
				name: <?php echo 'name_'.$dev['id'] ."_". $l->valuenum; ?>,
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
			<?php echo 'seriesCounter_'.$dev['id'] ."_". $l->valuenum; ?>++;

			if (<?php echo 'seriesCounter_'.$dev['id'] ."_". $l->valuenum; ?> == <?php echo 'device_'.$dev['id'] ."_". $l->valuenum; ?>.length) {
				<?php echo 'createChart_'.$dev['id'] ."_". $l->valuenum .'();'?>
			}
		});
	});

	// create the chart when all data is loaded
	function <?php echo 'createChart_'.$dev['id'] ."_". $l->valuenum .'()'?> {

		$('#container_<?php echo $dev['id'] ."_". $l->valuenum; ?>').highcharts('StockChart', {
		    chart: {
		    },
			title: {
				text: '<?php echo trim($chartname); ?>' // Title for the chart
			},
			
			legend: {
				align: 'right',
				enabled: true,
				layout: 'vertical',
				verticalAlign: 'top',
				y:50
			},

		    rangeSelector: {
				inputEnabled: $('#container<?php echo $dev['id'] ."_". $l->valuenum; ?>').width() > 480,
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
		    
		    series: <?php echo 'seriesOptions_'.$dev['id'] ."_". $l->valuenum; ?>
		});
	}
	
    <?php 
	}// array countchart_details
	} // end DeviceValues loop
	$chartvalue = '';
	endforeach; // end devices loop
	?>

});
//]]>
</script>
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="http://code.highcharts.com/stock/modules/exporting.js"></script>

<p>
<b>Supported graph types:</b><br>
<b>* COUNTER :</b> it will display a graph (only bars) when values of the device are logged and the charts name is filled (Valuerrddsname) <br>
<b>* GAUGE :</b> it will display a GAUGE when values of the device are logged and the charts name is filled (Valuerrddsname) <br><br>
More graph types will follow soon!<br><br>
</p>
    <?php 
		foreach ($data as $dev): 
			$criteria = new CDbCriteria();
			$criteria->condition = 'device_id='.$dev['id'];
			// DeviceValues loop
			foreach (DeviceValues::model()->findAll($criteria) as $l) {
			 print '<!-- valuenum: '. $l->valuenum .'-->';
			 print '<!-- units: '. $l->units .'-->';
			 print '<!-- valuerrdtype: '. $l->valuerrdtype .'-->';
			 print '<!-- valuerrddsname: '. $l->valuerrddsname .'-->';
			 
		$chart_details = $this->getChartDetails($dev['id'], $l->valuenum, $l->valuerrdtype);
		
		// start if GAUGE
		if ( $l->valuerrdtype == 'GAUGE' && $l->units != null && $l->valuerrddsname != null) {
	?>
			<div id="container_gauge_<?php echo $dev['id'] ."_". $l->valuenum; ?>" style="height: 300px; min-width: 300px"></div>
	<?php
		} //end if gauge
		
		// start if COUNTER
		if ( count( $chart_details) > 0 && $l->valuerrdtype == 'COUNTER') {
	?>
		<div id="container_<?php echo $dev['id'] ."_". $l->valuenum; ?>" style="height: 400px; min-width: 310px"></div>
	<?php
		} //end if counter
		} // end DeviceValues loop
		endforeach;
	?>