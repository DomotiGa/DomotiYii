<?php
/**
 * This script is called by the highcharts through the getJSON function. It will retrieve the data through a separate database connection
 * based on the given parameters. 
 * 
 * At the moment it only supports the COUNTER graph type wich will count the values in the log for a device. The output is DATE, VALUE.
 * 
 * @param callback {String} The name of the JSONP callback to pad the JSON within
 * @param start {Integer} The starting point in JS time
 * @param end {Integer} The ending point in JS time
 */

// get the parameters

if (isset($_GET['data'])) {
	$encryptedMysqlConnection = $_GET['data'];
}

if (isset($_GET['device'])) {
	$device_id = $_GET['device'];
}

if (isset($_GET['chartname'])) {
	$chartname = $_GET['chartname'];
}

if (isset($_GET['chartval'])) {
	$chartval = $_GET['chartval'];
}

if (isset($_GET['callback'])) {
	$callback = $_GET['callback'];
	if (!preg_match('/^[a-zA-Z0-9_]+$/', $callback)) {
		die('Invalid callback name');
	}
}

if (isset($_GET['start'])) {
	$start = $_GET['start'];
	if ($start && !preg_match('/^[0-9]+$/', $start)) {
		die("Invalid start parameter: $start");
	}
} else {
	$start = 0;
}

if (isset($_GET['end'])) {
	$end = $_GET['end'];
	if ($end && !preg_match('/^[0-9]+$/', $end)) {
		die("Invalid end parameter: $end");
	}
} else {
  $end = time() * 1000;
}

// connect to MySQL
$decryptedMysqlConnection = base64_decode($encryptedMysqlConnection);
$conn = explode(";", $decryptedMysqlConnection);
$host     = substr($conn[0], strpos($conn[0], '=')+1 ); // mysql host ip
$database = substr($conn[1], strpos($conn[1], '=')+1 ); // databasename
$user     = $conn[2]; // username
$password = $conn[3]; // password

// connect to MySQL
$con = mysql_connect($host,$user,$password, true, 65536);

if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db($database, $con);

// set UTC time
mysql_query("SET time_zone = '+00:00'");

// set some utility variables
$range = $end - $start;
$startTime = gmstrftime('%Y-%m-%d %H:%M:%S', $start / 1000);
$endTime = gmstrftime('%Y-%m-%d %H:%M:%S', $end / 1000);

$date_column = "unix_timestamp(CONCAT(date(dvl.lastchanged), ' ', maketime(HOUR(dvl.lastchanged),MINUTE(dvl.lastchanged),0))) * 1000";

$sql = "select " . $date_column . " as datum, 
SUM( IF( dvl.value='" . $chartval . "', 1, 0 ) ) as value1
FROM ". $database .".devices d
inner join ". $database .".device_values dv on d.id = dv.device_id 
inner join ". $database .".device_values_log dvl on d.id = dvl.device_id and dv.valuenum = dvl.valuenum
where dv.valuerrddsname = '" . $chartname . "'
and d.id = " . $device_id . "
group by " . $date_column . "
order by dvl.lastchanged";

$result = mysql_query($sql) or die(mysql_error());

$rows = array();
while ($row = mysql_fetch_assoc($result)) {
	extract($row);

	$rows[] = "[$datum,$value1]";
}

header('Content-Type: text/javascript');

echo $callback ."([\n" . join(",\n", $rows) ."\n]);";

mysql_close($con);
?>