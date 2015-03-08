<?php
require_once ('mysqliDB.php');
$db = new MysqliDb ('host', 'username', 'password', 'databaseName') or die("error al conectarse a la base de datos");
session_start();
date_default_timezone_set("UTC");
$plantid = $_get['plantid'];

$db->where ('password', $_SESSION['pass']);
$userdata = $db->getOne("user");

$db->where ('plantid', $plantid);
$plantidd = $db->getOne("sensors");

$db->where ('id', $plantidd['planttype']);
$planttype = $db->getOne("planttypes");

$db->where ('id', $plantidd['plantid']);
$db->orderBy("time","Desc");
$db->orderBy("date","Desc");
$waterinfo = $db->get("water", 4);

$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><a></a>');
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
    $water = $data->addChild('water-info');
    foreach ($waterinfo as $wa) {
        $water->addChild('id', $wa['id']);
        $water->addChild('date', $wa['date']);
        $water->addChild('time', $wa['time']);
        $water->addChild('watertime', $wa['wtertime']);
    }
Header('Content-type: text/xml');
print($xml->asXML());

?>