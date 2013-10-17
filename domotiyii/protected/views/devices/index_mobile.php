<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

    foreach($model->getDevices('all')->getData() as $device):
?>
    <div class="device" id="<?php echo $device['id']; ?>"> 
        <?php echo $device['devicename']; ?>
        <button class="btn" type="button" onclick="set_device('<?php echo $device['id']; ?>','<?php echo (strcmp($device['devicevalue'],'On') == 1 ?'Off':'On'); ?>');"><?php echo (strcmp($device['devicevalue'],'On') == 1 ?'Off':'On'); ?></button>

    </div>
<?php
    endforeach;
?>
