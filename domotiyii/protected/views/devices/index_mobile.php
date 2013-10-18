<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

    foreach($model->getDevices('all')->getData() as $device):
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
        <div class="device_rest_values">
            <p class="device_value_2"><?php echo $device['devicevalue2']; ?></p>
            <p class="device_value_3"><?php echo $device['devicevalue3']; ?></p>
            <p class="device_value_4"><?php echo $device['devicevalue4']; ?></p>
        </div>
        <?php if(strcmp($device['dimmable'],'T') == 0): ?>  
            <p> TODO </p>
        <?php elseif(strcmp($device['switchable'],'T') == 0): ?>
            <button class="btn" type="button" onclick="set_device('<?php echo $device['id']; ?>','<?php echo (strcmp($device['devicevalue'],'On') == 1 ?'Off':'On'); ?>');"><?php echo (strcmp($device['devicevalue'],'On') == 1 ?'Off':'On'); ?></button>
        <?php else: ?>
             <p class="device_value_1"><?php echo $device['devicevalue']; ?></p>
        <?php endif; ?>

        <p class="debug"> <?php var_dump($device); ?> </p>

    </div>

<?php
    endforeach;
?>
