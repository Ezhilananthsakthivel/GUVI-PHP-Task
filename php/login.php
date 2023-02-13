<?php

require '../vendor/autoload.php';

$con = mysqli_connect('localhost:3308','root','','guvi_task');
$mcon = new MongoDB\Client("mongodb://localhost:27017");

$uname = $_POST["uname"];
$password = $_POST["password"];

$user = mysqli_query($con, "select * from users where uname = '$uname'");

if (mysqli_num_rows($user) == 1) {
    $row = mysqli_fetch_assoc($user);
    if ($row['password'] == $password) {
        $db = $mcon->guvitask->users;
        $dbuser = $db->findOne(['uname'=>$uname]);
        echo json_encode(array("status"=>"Login Successfully","uname"=>$row['uname'],"email"=>$row['email'],"dbuser"=>$dbuser));
        exit();
    }
    else{
        echo json_encode(array("error"=>"Incorect Password"));
        exit();
    }
}
else{
    echo json_encode(array("error"=>"User Not Registered"));
    exit();
}
