<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/domotiga.js"></script>

	<?php Yii::app()->bootstrap->register(); ?>
</head>
<body>
<div class="contain" id="page">

      <div id="header">
                <div id="logo"></br></div>
        </div><!-- header -->
<div class="navbar navbar-inverse">
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'items'=>array(
                array('label'=>'Devices', 'url'=> array('/devices/index')),
                array('label'=>'Home', 'url'=> array('/site/index')),
                array('label'=>'Setup', 'visible'=>!Yii::app()->user->isGuest, 'url'=>'#', 'items'=>array(
                    array('label'=>'Main', 'url'=> array('settings/main')),
                    array('label'=>'Astro and Location', 'url'=> array('settings/astro')),
                    array('label'=>'CallerID', 'url'=> array('settings/callerid')),
                    array('label'=>'E-mail', 'url'=> array('settings/email')),
                    array('label'=>'Google', 'url'=>'#', 'items'=>array(
                       array('label'=>'GMail', 'url'=> array('settings/gmail')),
                       array('label'=>'GLatitude', 'url'=> array('settings/glatitude')),
		    )),
                    array('label'=>'Twitter', 'url'=> array('settings/twitter')),
                    array('label'=>'Servers', 'url'=>'#', 'items'=>array(
                       array('label'=>'Telnet Server', 'url'=> array('settings/telnetserver')),
                       array('label'=>'SmartVISU Server', 'url'=> array('settings/smartvisu')),
                       array('label'=>'XML-RPC Server', 'url'=> array('settings/xmlrpc')),
		    )),
                    array('label'=>'Sound', 'url'=> array('settings/sound')),
                    array('label'=>'VoiceText', 'url'=> array('settings/voicetext')),
                    array('label'=>'Weather', 'url'=>'#', 'items'=>array(
                       array('label'=>'WeatherBug', 'url'=> array('settings/weatherbug')),
                    )),
                    array('label'=>'Server Stats', 'url'=> array('settings/serverstats')),
                    array('label'=>'TV Guide', 'url'=>'#', 'items'=>array(
                       array('label'=>'Settings', 'url'=> array('settings/tvguide')),
                       array('label'=>'Channels', 'url'=> array('settings/tvchannels')),
                       array('label'=>'Categories', 'url'=> array('settings/tvcategories')),
                    )),
                    array('label'=>'Publish Data', 'url'=>'#', 'items'=>array(
                       array('label'=>'Bwired Map', 'url'=> array('settings/bwiredmap')),
                       array('label'=>'MQTT', 'url'=> array('settings/mqtt')),
                       array('label'=>'Pachube', 'url'=> array('settings/pachube')),
                       array('label'=>'PVoutput', 'url'=> array('settings/pvoutput')),
                       array('label'=>'TemperaturNu', 'url'=> array('settings/temperaturnu')),
                    )),
                    array('label'=>'Thermostat', 'url'=> array('settings/thermostat')),
                 )),
                 array('label'=>'Interfaces', 'visible'=>!Yii::app()->user->isGuest, 'url'=>'#', 'items'=>array(
                    array('label'=>'1-Wire', 'url'=>'#', 'items'=>array(
                       array('label'=>'Digitemp', 'url'=> array('settings/digitemp')),
                       array('label'=>'Midon TEMP08', 'url'=> array('settings/temp08')),
                       array('label'=>'OWFS', 'url'=> array('settings/owfs')),
                       array('label'=>'OWW', 'url'=> array('settings/oww')),
                    )),
                    array('label'=>'Audio Video', 'url'=>'#', 'items'=>array(
                       array('label'=>'Denon AV', 'url'=> array('settings/denon')),
                       array('label'=>'iPort Dock', 'url'=> array('settings/iport')),
                       array('label'=>'LG TV', 'url'=> array('settings/lgtv')),
                       array('label'=>'Onkyo/Integra AV', 'url'=> array('settings/onkyo')),
                       array('label'=>'Pioneer AV', 'url'=> array('settings/pioneer')),
                       array('label'=>'Sharp TV', 'url'=> array('settings/sharptv')),
                       array('label'=>'Squeeze Server', 'url'=> array('settings/squeezeserver')),
                    )),
                    array('label'=>'CallerID', 'url'=>'#', 'items'=>array(
                       array('label'=>'Asterisk', 'url'=> array('settings/asterisk')),
                       array('label'=>'Fritz!Box', 'url'=> array('settings/fritzbox')),
                       array('label'=>'Ncid', 'url'=> array('settings/ncid')),
                    )),
                    array('label'=>'Cameras', 'url'=>'#', 'items'=>array(
                       array('label'=>'Cameras', 'url'=> array('settings/cameras')),
                       array('label'=>'IP Videoserver', 'url'=> array('settings/videoserver')),
                       array('label'=>'Sony Visca', 'url'=> array('settings/visca')),
                    )),
                    array('label'=>'CUL', 'url'=> array('settings/cul')),
                    array('label'=>'Device Control', 'url'=>'#', 'items'=>array(
                       array('label'=>'Anel PwrCtrl', 'url'=> array('settings/pwrctrl')),
                       array('label'=>'EZcontrol', 'url'=> array('settings/ezcontrol')),
                       array('label'=>'KNX/EIB', 'url'=> array('settings/eib')),
                       array('label'=>'PLCBUS', 'url'=> array('settings/plcbus')),
                       array('label'=>'X10', 'url'=>'#', 'items'=>array(
                          array('label'=>'X10Cmd', 'url'=> array('settings/x10cmd')),
                          array('label'=>'Xanura CTX35', 'url'=> array('settings/ctx35')),
                       )),
                    array('label'=>'Z-Wave', 'url'=> array('settings/zwave')),
                    )),
                       array('label'=>'Energy Measurement', 'url'=>'#', 'items'=>array(
                          array('label'=>'Current Cost', 'url'=> array('settings/currentcost')),
                          array('label'=>'Plugwise', 'url'=> array('settings/plugwise')),
                          array('label'=>'SmartMeter', 'url'=> array('settings/nta8130')),
                       )),
                       array('label'=>'HDDTemp', 'url'=> array('settings/hddtemp')),
                       array('label'=>'HomeMatic', 'url'=> array('settings/homematic')),
                       array('label'=>'Input/Output', 'url'=>'#', 'items'=>array(
                          array('label'=>'KMTronic UDP', 'url'=> array('settings/kmtronicudp')),
                          array('label'=>'Velleman K8055', 'url'=> array('settings/k8055')),
                          array('label'=>'Weeder I/O', 'url'=> array('settings/weeder')),
                       )),
                       array('label'=>'Remote Control', 'url'=>'#', 'items'=>array(
                          array('label'=>'CF iViewer', 'url'=> array('settings/iviewer')),
                          array('label'=>'UIR/IRMan', 'url'=> array('settings/irman')),
                          array('label'=>'IRTrans', 'url'=> array('settings/irtrans')),
                          array('label'=>'LIRC', 'url'=> array('settings/lirc')),
                       )),
                       array('label'=>'Jeelabs', 'url'=> array('settings/jeelabs')),
                       array('label'=>'LED Matrix', 'url'=> array('settings/ledmatrix')),
                       array('label'=>'Mobile', 'url'=>'#', 'items'=>array(
                          array('label'=>'Bluetooth', 'url'=> array('settings/bluetooth')),
                          array('label'=>'SMS Modem', 'url'=> array('settings/sms')),
                       )),
                       array('label'=>'Network Ping', 'url'=> array('settings/ping')),
                       array('label'=>'NMEA GPS', 'url'=> array('settings/gps')),
                       array('label'=>'OpenTherm', 'url'=> array('settings/opentherm')),
                       array('label'=>'RRDTool', 'url'=> array('settings/rrdtool')),
                       array('label'=>'RFXCom', 'url'=>'#', 'items'=>array(
                          array('label'=>'RFXCom Receiver', 'url'=> array('settings/rfxcomrx')),
                          array('label'=>'RFXCom Transmitter', 'url'=> array('settings/rfxcomtx')),
                          array('label'=>'RFXCom Transceiver', 'url'=> array('settings/rfxcomtrx')),
                          array('label'=>'RFXCom xPL', 'url'=> array('settings/rfxcomxpl')),
                       )),
                       array('label'=>'Security', 'url'=>'#', 'items'=>array(
                          array('label'=>'DSC Security', 'url'=> array('settings/dsc')),
                          array('label'=>'Visonic', 'url'=> array('settings/visonic')),
                       )),
                       array('label'=>'Shell', 'url'=> array('settings/shell')),
                       array('label'=>'UPS Monitor', 'url'=> array('settings/ups')),
                       array('label'=>'xPL', 'url'=> array('settings/xpl')),
		    )),
                       array('label'=>'Gii', 'url'=> array('/gii')),
            ),
        ),
        '<form class="navbar-search pull-right" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'About', 'url'=>'#', 'items'=>array(
                    array('label'=>'Visit Project Website', 'url'=>'http://domotiga.nl'),
                    array('label'=>'Donate to Project', 'url'=>'https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=NT48KZRT7F3FA&lc=US&item_name=DomotiGa%20Open%20Source%20Project&item_number=domotiga&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted'),
		TbHtml::menuDivider(),
                    array('label'=>'Contact Support', 'url'=> array('/site/contact')),
                    array('label'=>'About DomotiGa', 'url'=> array('/site/about')),
                )),
            ),
        ),
    ),
)); ?>
</div>
	<?php if(isset($this->breadcrumb)):?>
<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links'=>$this->breadcrumbs,
)); ?>
<?php endif?>

    <?php echo $content; ?>
 <?php foreach(array('error', 'notice', 'success') as $key): ?>
        <?php if (Yii::app()->user->hasFlash($key)): ?>
            <div class="flash-<?php echo $key ?>">
                <?php echo Yii::app()->user->getFlash($key) ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
	<div id="footer">
Credits and Copyright © <?php echo date("Y"); ?> <a href="http://www.domotiga.nl/" >DomotiGa</a> <a href="mailto:support@domotiga.nl"></a> created by Ron Klinkien
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
