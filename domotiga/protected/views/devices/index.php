<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Devices',
);

function do_xmlrpc($request) {

   $context = stream_context_create(array('http' => array('method' => "POST",'header' =>"Content-Type: text/xml",'content' => $request)));
   if ($file = @file_get_contents(Yii::app()->params['xmlrpcHost'], false, $context)) {
       $file=str_replace("i8","double",$file);
       return xmlrpc_decode($file, "UTF-8");
   } else {
      die ("<h2>Cannot connect to the DomotiGa server!</h2>");
   }
}

// Get device list
function get_device_list() {
   $request = xmlrpc_encode_request("device.list",null);
   $response = do_xmlrpc($request);

if (false) {
       trigger_error("xmlrpc: $response[faultString] ($response[faultCode])");
   } else {
      $index=0;
      foreach($response AS $item) {
         list( $retarr[$index]['id'], $retarr[$index]['deviceicon'], $retarr[$index]['devicename'], $retarr[$index]['devicelocation'], $retarr[$index]['devicevalue'], $retarr[$index]['devicelabel'], $retarr[$index]['devicevalue2'], $retarr[$index]['devicelabel2'], $retarr[$index]['devicevalue3'], $retarr[$index]['devicelabel3'], $retarr[$index]['devicevalue4'], $retarr[$index]['devicelabel4'], $retarr[$index]['devicelastseen'], $retarr[$index]['dimmable'], $retarr[$index]['switchable']) = explode (';;', $item);
         if (strlen($retarr[$index]['devicevalue']) && $retarr[$index]['devicelabel']) { $retarr[$index]['devicevalue'] = $retarr[$index]['devicevalue']. " ".$retarr[$index]['devicelabel']; }
         if (strlen($retarr[$index]['devicevalue2']) && $retarr[$index]['devicelabel2']) { $retarr[$index]['devicevalue2'] = $retarr[$index]['devicevalue2']. " ".$retarr[$index]['devicelabel2']; }
         if (strlen($retarr[$index]['devicevalue3']) && $retarr[$index]['devicelabel3']) { $retarr[$index]['devicevalue3'] = $retarr[$index]['devicevalue3']. " ".$retarr[$index]['devicelabel3']; }
         if (strlen($retarr[$index]['devicevalue4']) && $retarr[$index]['devicelabel4']) { $retarr[$index]['devicevalue4'] = $retarr[$index]['devicevalue4']. " ".$retarr[$index]['devicelabel4']; }
         $index++;
      }
      if (isset($retarr)) {
         return $retarr;
      } else {
         return FALSE;
      }
   }
}

$deviceitems = new CArrayDataProvider(get_device_list(), array(
'pagination' => array(
            'pageSize' => 30,
            'pageVar' => 'page'
        ),
));
//http://yiibooster.clevertech.biz/extended-grid.html
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped condensed',
    'dataProvider'=>$deviceitems,
    'template'=>'{items}{pager}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'devicename', 'header'=>'Name', 'htmlOptions'=>array('width'=>'250')),
        array('name'=>'devicevalue', 'header'=>'Value', 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'devicevalue2', 'header'=>'Value2', 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'devicevalue3', 'header'=>'Value3', 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'devicevalue4', 'header'=>'Value4', 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'devicelocation', 'header'=>'Location', 'htmlOptions'=>array('width'=>'120')),
        array('name'=>'devicelastseen', 'header'=>'Last Seen', 'htmlOptions'=>array('width'=>'120')),
	),
)); ?>
