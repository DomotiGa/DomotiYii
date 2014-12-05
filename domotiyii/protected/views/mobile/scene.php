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

<div class="scenes">
<?php
// end generate location and type menu
foreach($model_scenes->search(false)->getData() as $scene):
?>
	<div class="scene" data-id="<?php echo $scene['id']; ?>">
		
		<div class="ui-body ui-body-b">
			<p><strong><?php echo $scene['name'];  ?></strong></p>
			<a href="#" name="run<?php echo $scene['id']; ?>" id="run<?php echo $scene['id']; ?>" data-role="button" data-theme="a" data-icon="arrow-r" >Run</a>
		</div>
		<br/>
	</div>
<?php
endforeach;
?>
</div>