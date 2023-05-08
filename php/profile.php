<?php

require '../vendor/autoload.php';

$mcon = new MongoDB\Client("mongodb://localhost:27017");
$rcon = new Predis\Client();

$db = $mcon->guvitask->users;

// $uname = $_POST["uname"];
$pnumber = $_POST["pnumber"];
$dob = $_POST["dob"];
$degree = $_POST["degree"];
$yop = $_POST["yop"];
$redstr = $_POST["redstr"];

$reduname = $rcon->get($redstr);
if ($reduname) {
    $reduname = json_decode($reduname);
    $db->updateOne(['uname'=>$reduname['uname']],['$set'=>['pnumber'=>$pnumber,'dob'=>$dob,'degree'=>$degree,'yop'=>$yop]]);
    echo "Update Successfully";
}


?>