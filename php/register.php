<?php

require '../vendor/autoload.php';

$con = mysqli_connect('localhost:3308','root','','guvi_task');
$mcon = new MongoDB\Client("mongodb://localhost:27017");

$email = $_POST["email"];
$uname = $_POST["uname"];
$password = $_POST["password"];
$pnumber = $_POST["pnumber"];
$dob = $_POST["dob"];
$degree = $_POST["degree"];
$yop = $_POST["yop"];

$user = mysqli_query($con,"select * from users where uname = '$uname'");

if(mysqli_num_rows($user) > 0){
    echo "User Already Exists";
    exit();
}
    
    mysqli_query($con,"insert into users (uname,password,email) values ('$uname','$password','$email')");

    $db = $mcon->guvitask->users;
    $db->insertOne(['uname'=> $uname, 'pnumber'=> $pnumber, 'dob'=> $dob, 'degree'=> $degree, 'yop'=> $yop]);
    echo "Registration Successfully";

?>