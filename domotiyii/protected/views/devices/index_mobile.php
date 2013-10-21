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
