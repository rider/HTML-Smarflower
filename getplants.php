<?php
require_once ('mysqliDB.php');
$db = new MysqliDb ('host', 'username', 'password', 'databaseName') or die("error al conectarse a la base de datos");
session_start();
date_default_timezone_set("UTC");

$db->where ('password', $_SESSION['pass']);
$userdata = $db->getOne("user");

$db->where ('user', $userdata['username']);
$userplants = $db->getOne("sensors", 100);


$xml = new SimpleXMLElement($xml->asXML());
    $data = $xml->addChild('paneldata');
    $user = $data->addChild('user-info');
    $user->addChild('name', $userdata['username']);
    $plants = $data->addChild('plants-info');
    foreach ($userplants as $plant) {
    $plants->addChild('name', $plant['name']);
    $plants->addChild('description', $plant['description']);
    $plants->addChild('user', $plant['username']);
    $plants->addChild('plantid', $plant['plantid']);
    $plants->addChild('id', $plant['id']);
    }
Header('Content-type: text/xml');
print($xml->asXML());

?>