<?php

/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Home'),
    ),
));

$this->widget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'DomotiGa',
    'content' => yii::t('app', 'This is a new web client build from scratch using the Yii framework together with the Yiistrap extension to add the bootstrap look and feel.')
));

echo "<p>";
try {
    Yii::app()->db;
    $versionDB = Version::model()->findBySql('select id,db from version order by id DESC LIMIT 1')->getAttributes();
    $versionDBRequired = Yii::app()->params['versionDBRequired'];
    echo "<b>Database : </b> Version used : " . $versionDB['db'] . " - Version required (minimum) : " . $versionDBRequired;
    if ($versionDBRequired > $versionDB['db'])
        echo '  <span style="color:red;font-size:150%">Database update is needed!</span>';
} catch(Exception $e) {
        Yii::app()->user->setFlash('error', Yii::t('app', 'Cannot connect to DomotiGa\'s database!'));
}
echo "</p>";

echo "<p>";
try {
 	echo "<b>JSON-RPC</b> version: ";
        $res = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'api.version', 'id' => 1));
        if ($res) {
            if ($res->result) {
             	echo $res->result;
            } else {
		echo '<span style="color:red;font-size:100%">Not available.</span>';
            }
        }

} catch(Exception $e) {
	echo '<span style="color:red;font-size:100%">An error occured fetching JSON-RPC\'s version!</span>';
}
echo "</p>";

?>
