<?php
// Assets path
$pathHighCharts = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.components.assets.jquerymobile'));

// Get client script
$cs=Yii::app()->clientScript;

$cs->registerCssFile( $pathHighCharts . '/jquery.mobile-1.3.1.css' );

// Add Js
$cs->registerScriptFile($pathHighCharts .'/jquery-1.9.1.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile($pathHighCharts .'/jquery.mobile-1.3.1.min.js', CClientScript::POS_HEAD);

$type = Yii::app()->request->getParam('type','all');
$location_id = Yii::app()->request->getParam('location','0');

$loc = array();
$loc['All'] = Yii::t('app','All locations');

foreach($model_locations->findAll(array('order'=>'name')) as $currentlocation){
	if ( $currentlocation['name'] != ''){
		$loc[$currentlocation['id']] = $currentlocation['name'];
	}
}

$typ = array();
$typ['All'] = Yii::t('app','All types');
$typ['sensors'] = Yii::t('app','Sensors');
$typ['dimmers'] = Yii::t('app','Dimmers');
$typ['switches'] = Yii::t('app','Switches');
?>
    <div class="device_error"></div>
	<div data-role="navbar">
	  <ul>
		<li>
		<div data-role="fieldcontain">
			<?php echo CHtml::dropDownList('location', '', $loc);?>
		</div>
		</li>
		<li>
		<div data-role="fieldcontain">
			<?php echo CHtml::dropDownList('type', '', $typ);?>
		</div> 
		</li>
	  </ul>
	</div>	

<div class="devices" data-role="collapsible-set">
<?php
    // end generate location and type menu

    foreach($model_devices->search(false)->getData() as $device):
?>

    <div style="margin-top: 10px;" data-role="collapsible" data-collapsed="true" data-theme="a" data-content-theme="b" class="device" data-id="<?php echo $device['id']; ?>"> 
            <h3 class="device_name">
                <?php echo $device['name']; ?>
				<div class="device_status"></div>				
            </h3>
		<p>
		<?php if( $device['switchable'] || $device['dimable'] ): ?>
		<div id="button-set" data-role="navbar" data-type="horizontal">
			<ul>
				<li><a href="#" data-role="button" data-theme='c' value='On' data-icon="check" id="but-on"/>On</a></li>
				<li><a href="#" data-role="button" data-theme='c' value='Off' data-icon="delete" id="but-off"/>Off</a></li>
			</ul>
		</div>           
		<?php endif; ?>
        <div class="device_info">
		<br/>
			<div class="device_value_2"></div>
			<div class="device_value_3"></div>
			<div class="device_value_4"></div>
			<?php if( !(trim($device['locationtext']) === "") ): ?>
			<b>Location:</b> <?php echo $device['locationtext']; ?><br/>
			<?php endif; ?>
			<b>Last changed:</b> <?php echo $device['lastchanged']; ?><br/>
			<b>Last seen:</b> <?php echo $device['lastseen']; ?><br/>
			<?php if( !(trim($device['batterystatus']) === "") ): ?>
			<b>Battery:</b> <?php echo $device['batterystatus']; ?> <br/>
			<?php endif; ?>		

			<div class="slider-container" <?php if(!$device['dimable']): ?> style="display:none" <?php endif; ?>>
				<input type="range" name="slider<?php echo $device['id']; ?>" id="slider<?php echo $device['id']; ?>" min="0" max="100" step="1" value="0" data-highlight="true" data-theme="d" data-track-theme="a">
			</div>
        </div>
		</p>
    </div>
<?php
    endforeach;
?>
</div>
