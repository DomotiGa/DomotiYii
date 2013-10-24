<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

  $type = Yii::app()->request->getParam('type','all');
  $location_id = Yii::app()->request->getParam('location','0');
  $location_object = $locations->findByPk($location_id);

    // Generate breadcrumb
    $breadcrumb_links = array();

    if($location_id == '0' && $type == 'all'){
        array_push($breadcrumb_links,Yii::t('translate','Devices'));
    }else{
        $breadcrumb_links[Yii::t('translate','Devices')] = 'index';
        
        if($location_id != '0' && $type == 'all'){
            array_push($breadcrumb_links,$location_object->name);
        }elseif($location_id == '0' && $type != 'all'){
            array_push($breadcrumb_links,Yii::t('translate',$type));
        }else{
            $breadcrumb_links[$location_object->name] = 'index?location='.$location_id;
            array_push($breadcrumb_links,Yii::t('translate',$type));
        }
    }
   
    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
        'links' => $breadcrumb_links,
    ));


    // generate location and type menu
    $links_location = array(array('label'=>Yii::t('translate','All'), 'url'=>'index?type='.$type, 'active'=>$location_id == '0'));
  
    foreach($locations->findAll(array('order'=>'name')) as $currentlocation){
        if ( $currentlocation['name'] != ''){
            array_push($links_location, array('label'=>$currentlocation['name'], 'url'=>'index?type='.$type.'&location='.$currentlocation['id'], 'active'=>$location_id == $currentlocation['id']));
         }
     }
 
    $links_type = array(
        array('label'=>Yii::t('translate','All'), 'url'=>'index?location='.$location_id, 'active'=>$type == '0'),
        array('label'=>Yii::t('translate','Sensors'), 'url'=>'index?type=sensors&location='.$location_id, 'active'=>$type == 'sensors'),
        array('label'=>Yii::t('translate','Dimmers'), 'url'=>'index?type=dimmers&location='.$location_id, 'active'=>$type == 'dimmers'),
        array('label'=>Yii::t('translate','Switches'), 'url'=>'index?type=switches&location='.$location_id, 'active'=>$type == 'switches'),
    );

     $this->widget('bootstrap.widgets.TbNav', array(
         'type'=>'tabs',
         'stacked'=>false,
         'items'=>array(
            array('label'=>Yii::t('translate','Location'), 'icon'=>'map-marker', 'url'=>'#', 'items' => $links_location),
            array('label'=>'Type', 'icon'=>'tags', 'url'=>'#', 'items' => $links_type),
         ),
     ));
 
    // end generate location and type menu

    foreach($model->search(false)->getData() as $device):
?>

       
    <div class="device" id="<?php echo $device['id']; ?>"> 
        <div>
            <h5 class="device_name">
                <?php echo $device['name']; ?>
                <i class="icon-chevron-down"></i>
            </h5>    
            <h6 class="device_status">
            	<?php echo $device['valuelabel']; ?>
            </h6>
        </div>
        <div class="clear"></div>   
        <div class="device_info">
            <?php if( !(trim($device['locationtext']) === "") ): ?>
                <h6 class="device_location"><i class="icon-map-marker"></i><?php echo $device['locationtext']; ?></h6>
            <?php endif; ?>
            <?php if( !(trim($device['valuelabel2']) === "") ): ?>
                <p class="device_value_2"><i class="icon-tag"></i><?php echo $device['valuelabel2']; ?></p>
            <?php endif; ?>
            <?php if( !(trim($device['valuelabel3']) === "") ): ?>
                <p class="device_value_3"><i class="icon-tag"></i><?php echo $device['valuelabel3']; ?></p>
            <?php endif; ?>
            <?php if( !(trim($device['valuelabel4']) === "") ): ?>
                <p class="device_value_4"><i class="icon-tag"></i><?php echo $device['valuelabel4']; ?></p>
            <?php endif; ?>
            <?php if( !(trim($device['lastseentext']) === "") ): ?>
                <p class="device_lastseen"><i class="icon-time"></i><?php echo $device['lastseentext']; ?></p>
            <?php endif; ?>

            <?php if( $device['switchable'] || $device['dimable'] ): ?>
                <div class="btn-group switch_device">
                    <button class="btn <?php echo (strcmp($device['valuelabel'],'On') == 1 ?'btn-primary':''); ?>">On</button>
                    <button class="btn <?php echo (strcmp($device['valuelabel'],'Off') == 1 ?'btn-primary':''); ?>">Off</button>
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
