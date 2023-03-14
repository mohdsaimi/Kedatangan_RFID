<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
//session_start();

$uname="root";
$passwd="";
$database="kedatangan_rfid";

$conn = mysqli_connect('localhost', $uname,$passwd,$database);
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

?>
