<?php

require './vendor/autoload.php';

$con = mysqli_connect('localhost:3308','root','','guvi_task');
$mcon = new MongoDB\Client("mongodb://localhost:27017");

$uname = $_POST["uname"];
$email = $_POST["email"];
$password = $_POST["password"];

$user = mysqli_query($con,"select * from users where uname = '{$uname}'");
if(mysqli_num_rows($user) > 0){
    echo "User Already Exists";
    exit();
}

$sql = "insert into users (uname,email,password) values('{$uname}','{$email}','{$password}')";
mysqli_query($con,$sql);
$db = $mcon->guvitask->users;
$db->insertOne(["uname"=>"{$uname}"]);
echo "Registration Successfully";

?>
