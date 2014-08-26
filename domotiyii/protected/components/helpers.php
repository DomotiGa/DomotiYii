<?php

	function echoTranslate($text){
		echo Yii::t('app',$text);
	}

	function giveJsonBack($data){
		header('Content-type: application/json');
		
		// check if data is already be encoded to json
		if(json_validate($data)){
			echo $data;
		}else{
			echo json_encode($data);
		}
	}

    function json_validate($string) {
        if (is_string($string)) {
            @json_decode($string);
            return (json_last_error() === JSON_ERROR_NONE);
        }
        return false;
    }



	function doJsonRpc($data = array()) {
        if(json_validate($data)){
			$request = $data;
		}else{
			$request = json_encode($data);
		}

        $context = stream_context_create(
            array('http' =>
                array('method' => "POST",
                    'header' => "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n",
                    'content' => $request)));
        $file = @file_get_contents(Yii::app()->params['jsonrpcHost'], false, $context);

        if ($file === FALSE) {
            // could not connect
            return (object) array("jsonrpc" => "2.0", "result" => false, "id" => 1);
        } else {
            return @json_decode($file);
        }
    }
?>
