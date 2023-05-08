<?php

require '../vendor/autoload.php';

$mcon = new MongoDB\Client("mongodb://localhost:27017");
$db = $mcon->guvitask->users;
$rcon = new Predis\Client();

$redstr = $_POST["redstr"];

$reduname = $rcon->get($redstr);
if ($reduname) {
    $reduname = json_decode($reduname);
    $dbuser = $db->findOne(['uname' => $reduname['uname']]);
    echo json_encode(array("status" => "User Found", "dbuser" => $dbuser, 'email' => $reduname['email']));
}





// $uname = $_POST["uname"];
// $pnumber = $_POST["pnumber"];
// $dob = $_POST["dob"];
// $degree = $_POST["degree"];
// $yop = $_POST["yop"];

// $db = $mcon->guvitask->users;

// $db->updateOne(['uname' => $uname], ['$set' => ['pnumber' => $pnumber, 'dob' => $dob, 'degree' => $degree, 'yop' => $yop]]);
// echo "Update Successfully";
