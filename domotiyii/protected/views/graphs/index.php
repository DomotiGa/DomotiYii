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

// Get the mysql db parameters and encrypt it. So it is possible to give this to the getGraphData.php script of highcharts.
// This is not very secure but we could add more encryption later...!!!
$config = Yii::app()->getComponents(false);
$mysqlconnection = $config['db']->connectionString . ";" . $config['db']->username . ";" . $config['db']->password; 
$encryptedMysqlConnection = base64_encode($mysqlconnection);
/* 
Below we first create a javascript block for all the highcharts. 
Loop through all devices and create a seperate javascript function for it to display the graph.
*/
?>

<script type='text/javascript'>//<![CDATA[
$( function() {

    <?php foreach ($data as $dev): 
	//echo $dev['id']; 
	//echo $dev['name'];
	// this function gets all details to display the graphs
	$chart_details = $this->getChartDetails($dev['id']);

	if ( count( $chart_details) > 0 ) {
		foreach($chart_details as $item){
			$chartname = $item['chartname'];
			$row = $item['chartvalue'];
			
			$chartvalue[] = $row;
		}
		$chartvalues = implode("','",$chartvalue);
		//echo "'" . $chartvalues . "'";

	?>
<!-- -------------------------------------------------------------- -->
<!-- -------------------------------------------------------------- -->
	var <?php echo 'seriesOptions_'.$dev['id'] ?> = [],
		yAxisOptions = [],
		<?php echo 'seriesCounter_'.$dev['id'] ?> = 0,
		<?php echo 'device_'.$dev['id'] ?> = <?php echo "['" . $chartvalues . "']" ?> ,
		colors = Highcharts.getOptions().colors;

	$.each(<?php echo 'device_'.$dev['id'] ?>, function(<?php echo 'i_'.$dev['id'] ?>, <?php echo 'name_'.$dev['id'] ?>) {

		$.getJSON('<?php echo Yii::app()->request->baseUrl; ?>/Graphs/getGraphData?device=<?php echo $dev['id']; ?>&chartname=<?php echo trim($chartname); ?>&chartval='+ <?php echo 'name_'.$dev['id'] ?> +'&callback=?',	function(data) {

			<?php echo 'seriesOptions_'.$dev['id'] ?>[<?php echo 'i_'.$dev['id'] ?>] = {
				type: 'column',
				name: <?php echo 'name_'.$dev['id'] ?>,
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
			<?php echo 'seriesCounter_'.$dev['id'] ?>++;

			if (<?php echo 'seriesCounter_'.$dev['id'] ?> == <?php echo 'device_'.$dev['id'] ?>.length) {
				<?php echo 'createChart_'.$dev['id'] .'();'?>
			}
		});
	});

	// create the chart when all data is loaded
	function <?php echo 'createChart_'.$dev['id'] .'()'?> {

		$('#container_<?php echo $dev['id'] ?> ').highcharts('StockChart', {
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
				inputEnabled: $('#container').width() > 480,
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
		    
		    series: <?php echo 'seriesOptions_'.$dev['id'] ?>
		});
	}
	
    <?php }// array countchart_details
	$chartvalue = '';
	endforeach; 
	?>

});
//]]>
</script>
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/stock/modules/exporting.js"></script>

<p>
<b>Supported graph types:</b><br>
<b>* COUNTER :</b> it will display a graph (only bars) when values of the device are logged and the charts name is filled (Valuerrddsname) <br><br>
More graph types will follow soon!<br><br>
</p>
    <?php foreach ($data as $dev): 
		$chart_details = $this->getChartDetails($dev['id']);
		if ( count( $chart_details) > 0 ) {
	?>
		<div id="container_<?php echo $dev['id'] ?>" style="height: 400px; min-width: 310px"></div>
	<?php
		}	
		endforeach;
	?>