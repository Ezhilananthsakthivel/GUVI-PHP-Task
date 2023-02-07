<?php

require '../vendor/autoload.php';

$con = mysqli_connect('localhost:3308','root','','guvi_task');
$mcon = new MongoDB\Client("mongodb://localhost:27017");

$email = $_POST["email"];
$pnumber = $_POST["pnumber"];
$uname = $_POST["uname"];
$password = $_POST["password"];

$user = mysqli_query($con,"select * from users where uname = '$uname'");

if(mysqli_num_rows($user) > 0){
    echo "User Already Exists";
    exit();
}
    
    mysqli_query($con,"insert into users (uname,password) values ('$uname','$password')");

    $db = $mcon->guvitask->users;
    $db->insertOne(['uname'=> $uname,'email'=>$email, 'pnumber'=>$pnumber]);
    echo "Registration Successfully";


?>