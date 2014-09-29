<?php

class LogDataProvider extends CArrayDataProvider {

    private $logname;

    public function __construct($file, $config = array()) {

        $this->logname = $file;
        if(file_exists(Yii::app()->params['basePathDomotiGa'].$file)) {
            $handler = fopen(Yii::app()->params['basePathDomotiGa'].$file, 'r');
            $data = array();
            while (($line = fgets($handler)) !== False) {
                $data[] = explode('\n',$line);
            }
            fclose($handler);
        } else {
            $data[] = explode('\n',"File not found!\n");
	}
        $data = array_reverse($data);
        parent::__construct($data, array_merge($config, array(
            'keyField' => 0,
        )));
    }

    public function getLogName() {
        return $this->logname;
    }
}
