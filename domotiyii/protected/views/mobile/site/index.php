<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

  $type = Yii::app()->request->getParam('type','all');
  $location_id = Yii::app()->request->getParam('location','0');
  $location_object = $model_locations->findByPk($location_id);

    // Generate breadcrumb
    $breadcrumb_links = array();

    if($location_id == '0' && $type == 'all'){
        array_push($breadcrumb_links,Yii::t('app','Devices'));
    }else{
        $breadcrumb_links[Yii::t('app','Devices')] = 'index';
        
        if($location_id != '0' && $type == 'all'){
            array_push($breadcrumb_links,$location_object->name);
        }elseif($location_id == '0' && $type != 'all'){
            array_push($breadcrumb_links,Yii::t('app',$type));
        }else{
            $breadcrumb_links[$location_object->name] = 'index?location='.$location_id;
            array_push($breadcrumb_links,Yii::t('app',$type));
        }
    }
   
    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
        'links' => $breadcrumb_links,
    ));


    // generate location and type menu
    $links_location = array(array('label'=>Yii::t('app','All'), 'url'=>'index?type='.$type, 'active'=>$location_id == '0'));
  
    foreach($model_locations->findAll(array('order'=>'name')) as $currentlocation){
        if ( $currentlocation['name'] != ''){
            array_push($links_location, array('label'=>$currentlocation['name'], 'url'=>'index?type='.$type.'&location='.$currentlocation['id'], 'active'=>$location_id == $currentlocation['id']));
         }
     }
 
    $links_type = array(
        array('label'=>Yii::t('app','All'), 'url'=>'index?location='.$location_id, 'active'=>$type == 'all'),
        array('label'=>Yii::t('app','Sensors'), 'url'=>'index?type=sensors&location='.$location_id, 'active'=>$type == 'sensors'),
        array('label'=>Yii::t('app','Dimmers'), 'url'=>'index?type=dimmers&location='.$location_id, 'active'=>$type == 'dimmers'),
        array('label'=>Yii::t('app','Switches'), 'url'=>'index?type=switches&location='.$location_id, 'active'=>$type == 'switches'),
    );

     $this->widget('bootstrap.widgets.TbNav', array(
         'type'=>'tabs',
         'stacked'=>false,
         'items'=>array(
            array('label'=>Yii::t('app','Location'), 'icon'=>'map-marker', 'url'=>'#', 'items' => $links_location),
            array('label'=>'Type', 'icon'=>'tags', 'url'=>'#', 'items' => $links_type),
         ),
     ));
?>

<?php
    // end generate location and type menu

    foreach($model_scenes->search(false)->getData() as $scene):
?>
    <div class="scene" data-id="<?php echo $scene['id']; ?>"> 
        <div>
            <h5 class="scene_name">
                <?php echo $scene['name'];  ?>
            </h5>    
           	<button class="btn btn-primary scene_action">Run</button>
        </div>  
        <div class="clear"></div>   
    </div>
<?php
    endforeach;
?>


<?php
    // end generate location and type menu

    foreach($model_devices->search(false)->getData() as $device):
?>

       
    <div class="device" data-id="<?php echo $device['id']; ?>"> 
        <div>
            <h5 class="device_name">
                <?php echo $device['name']; ?>
                <i class="icon-chevron-down"></i>
            </h5>    
            <h6 class="device_status">
            </h6>
        </div>
        <div class="clear"></div>   
        <div class="device_info">
            <div class="device_info_value">
                <?php if( !(trim($device['locationtext']) === "") ): ?>
                    <h6 class="device_location"><i class="icon-map-marker"></i><?php echo $device['locationtext']; ?></h6>
                <?php endif; ?>
            </div>
            <h6 class="device_lastseen"><i class="icon-time"></i><?php echo $device['lastseen']; ?></h6>
            
            <?php if( $device['switchable'] || $device['dimable'] ): ?>
                <div class="btn-group switch_device">
                    <button class="btn">Off</button>
                    <button class="btn">On</button>
                </div>            
            <?php endif; ?>
            <?php if($device['dimable']): ?>  
                <div class="slider-container">
                    <input type="text" class="slider" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal" data-slider-selection="after"data-slider-tooltip="hide">
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php
    endforeach;
?>
