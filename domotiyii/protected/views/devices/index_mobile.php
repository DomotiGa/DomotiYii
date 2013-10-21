<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

    $type = Yii::app()->request->getParam('type','all');
    $location = Yii::app()->request->getParam('location','all');

    $this->widget('bootstrap.widgets.TbNav', array(
        'type'=>'tabs',
        'stacked'=>false,
        'items'=>array(
            array('label'=>Yii::t('translate','All'), 'url'=>'index?location='.$location, 'active'=>$type == 'all'),
            array('label'=>Yii::t('translate','Sensors'), 'url'=>'index?type=sensors&location='.$location, 'active'=>$type == 'sensors'),
            array('label'=>Yii::t('translate','Dimmers'), 'url'=>'index?type=dimmers&location='.$location, 'active'=>$type == 'dimmers'),
            array('label'=>Yii::t('translate','Switches'), 'url'=>'index?type=switches&location='.$location, 'active'=>$type == 'switches'),
        ),
    ));

    
    $links = array(array('label' => 'All', 'url'=>'index?type='.$type, 'active'=>$location == 'all'));
  
    foreach($locations as $currentlocation)
    {
        if ( $currentlocation['name'] != '')
        {
            array_push($links, array('label'=>$currentlocation['name'], 'url'=>'index?type='.$type.'&location='.$currentlocation['name'], 'active'=>$location == $currentlocation['name']));
        }
    }

    $this->widget('bootstrap.widgets.TbNav', array(
        'type'=>'tabs',
        'stacked'=>false,
        'items'=>array(
            array('label'=>Yii::t('translate','Location'), 'url'=>'#', 'items' => $links),
        ),
    ));

    foreach($model->getDevicesWithLocationWithoutPagination(Yii::app()->request->getParam('type','all'),$location)->getData() as $device):
?>

    <div class="device" id="<?php echo $device['id']; ?>"> 
        <div>
            <h5 class="device_name">
                <?php echo $device['devicename']; ?>
                <i class="icon-chevron-down"></i>
            </h5>    
            <h6 class="device_status">
            <?php if(strcmp($device['dimmable'],'T') == 0 || strcmp($device['switchable'],'T') == 0)
            {
                echo $device['devicevalue'];
            } ?>
            </h6>
        </div>
        <div class="clear"></div>   
        <div class="device_info">
            <h6 class="device_location"><i class="icon-map-marker"></i><?php echo $device['devicelocation']; ?></h6>
            <p class="device_value_2"><i class="icon-tag"></i><?php echo $device['devicevalue2']; ?></p>
            <p class="device_value_3"><i class="icon-tag"></i><?php echo $device['devicevalue3']; ?></p>
            <p class="device_value_4"><i class="icon-tag"></i><?php echo $device['devicevalue4']; ?></p>
            <?php if(strcmp($device['dimmable'],'T') == 0): ?>  
                <p> TODO </p>
            <?php elseif(strcmp($device['switchable'],'T') == 0): ?>
                <div class="btn-group switch_device">
                    <button class="btn <?php echo (strcmp($device['devicevalue'],'On') == 1 ?'btn-primary':''); ?>">On</button>
                    <button class="btn <?php echo (strcmp($device['devicevalue'],'Off') == 1 ?'btn-primary':''); ?>">Off</button>
                </div>            
            <?php else: ?>
               <p class="device_value_1"><i class="icon-info-sign"></i><?php echo $device['devicevalue']; ?></p>
            <?php endif; ?>
        </div>

    </div>

<?php
    endforeach;
?>
