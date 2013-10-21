<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

    foreach($model->getDevicesWithoutPagination('all')->getData() as $device):
?>

    <div class="device" id="<?php echo $device['id']; ?>"> 
        <div>
            <h5 class="device_name">
                <?php echo $device['devicename']; ?>
                <i class="icon-chevron-down"></i>
            </h5>    
            <h6 class="device_location"> <?php echo $device['devicelocation']; ?> </h6>
        </div>
        <div class="clear"></div>   
        <div class="device_info">
            <p class="device_value_2"><?php echo $device['devicevalue2']; ?></p>
            <p class="device_value_3"><?php echo $device['devicevalue3']; ?></p>
            <p class="device_value_4"><?php echo $device['devicevalue4']; ?></p>
            <?php if(strcmp($device['dimmable'],'T') == 0): ?>  
                <p> TODO </p>
            <?php elseif(strcmp($device['switchable'],'T') == 0): ?>
                <div class="btn-group switch_device">
                    <button class="btn <?php echo (strcmp($device['devicevalue'],'On') == 1 ?'btn-primary':''); ?>">On</button>
                    <button class="btn <?php echo (strcmp($device['devicevalue'],'Off') == 1 ?'btn-primary':''); ?>">Off</button>
                </div>            
            <?php else: ?>
               <p class="device_value_1"><?php echo $device['devicevalue']; ?></p>
            <?php endif; ?>
        </div>
        <p class="debug"> <?php var_dump($device); ?> </p>

    </div>

<?php
    endforeach;
?>
