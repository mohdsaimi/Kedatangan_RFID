<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
//session_start();

$uname="root";
$passwd="";
$database="kedatangan_rfid";

$satem2s = mysqli_connect('localhost', $uname,$passwd,$database);
if (!$satem2s) {
    die('Could not connect: ' . mysqli_error());
}else{
    echo "OK";
}

?>
