<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Help';

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Help'),
    ),
)); ?>

<legend>About DomotiGa</legend>
DomotiGa is Open Source Home Automation Software for Linux.
It's designed to control all sorts of devices, and receive input from various sensors.</br></br>

<legend>Configure DomotiYii</legend>

<PRE>Config file is protected/config/main.php

Yii is enabled. Gii is a Web-based tool that you will use to generate Models, Views, and Controllers for the application. Change it's password here, also change ipFilter so it contains your local subnet.

'class'=>'system.gii.GiiModule',
                    'password'=>'Giiha',
                    'ipFilters' => array('127.0.0.1', '192.168.*.*'),
Interface login is hardcoded to admin/admin right now.

Check DomotiGa database name, location and user/password.

            'db'=>array(
                    'connectionString' => 'mysql:host=localhost;dbname=domotiga',
                    'emulatePrepare' => true,
                    'username' => 'domouser',
                    'password' => 'kung-fu',
                    'charset' => 'utf8',
Check JSON-RPC host url // application-level parameters that can be accessed // 
using Yii::app()->params['paramName'] 'params'=>array( 'jsonrpcHost'=>'http://localhost:9090',

For changing language, you should change the line :

	'language' => 'fr', // add new translations under protected/messages/ 

</PRE>
<a href="http://www.domotiga.nl/projects/domotiyii/wiki/Installation">See the wiki for more</a>