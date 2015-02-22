<?php
require_once ('mysqliDB.php');
$db = new MysqliDb ('host', 'username', 'password', 'databaseName') or die("error al conectarse a la base de datos");
date_default_timezone_set("UTC");
$plantid = $_get['plantid'];

$db->where ('id', $plantid);
$sensorid = $db->getOne("sensors");

$db->where ('id', $sensorid['id']);
$db->where('date', date('Y-m-d'));
$db->orderBy("time","desc");
$data = $db->getOne("state");

$xml = new SimpleXMLElement('<xml/>');
    $livedata = $xml->addChild('livedata');
    $livedata->addChild('dirthumidity', $data['humidity']);
    $livedata->addChild('temp', $data['temp']);
    $livedata->addChild('humidity', $data['airhumidity']);
    $livedata->addChild('brigthness', $data['brigthness']);

Header('Content-type: text/xml');
print($xml->asXML());

?>