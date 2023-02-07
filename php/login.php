<?php

$con = mysqli_connect('localhost:3308','root','','guvi_task');
$uname = $_POST["uname"];
$password = $_POST["password"];
$sql = "select * from users where uname = '{$uname}'";
$user = mysqli_query($conn, $sql);

if (mysqli_num_rows($user) == 1) {
    $row = mysqli_fetch_assoc($user);
    if ($row['password'] == $password) {
        echo $row['uname'];
        exit();
    }
    else{
        echo "Incorect Password";
        exit();
    }
}else{
    echo "User Not Registered";
    exit();
}

?>
