<?php
require_once ('mysqliDB.php');
$db = new MysqliDb ('host', 'username', 'password', 'databaseName') or die("error al conectarse a la base de datos");
session_start();
date_default_timezone_set("UTC");
$plantid = $_get['plantid'];

$db->where ('password', $_SESSION['pass']);
$userdata = $db->getOne("user");

$db->where ('plantid', $plantid);
$plantid = $db->getOne("sensors");

$db->where ('id', $plantid['planttype']);
$planttype = $db->getOne("planttypes");

$xml = new SimpleXMLElement($xml->asXML());
    $data = $xml->addChild('paneldata');
    $user = $data->addChild('user-info');
    $user->addChild('name', $userdata['username']);
    $plant = $data->addChild('plant-info');
    $plant->addChild('name', $planttype['name']);
    $plant->addChild('description', $planttype['description']);
    $plant->addChild('temp', $planttype['temp']);
    $plant->addChild('humidity', $planttype['humidity']);
    $plant->addChild('dry', $planttype['dry']);
    $plant->addChild('daytime', $planttype['daytime']);

Header('Content-type: text/xml');
print($xml->asXML());

?>