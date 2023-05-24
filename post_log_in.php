<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

// Database name
$database = "sas";		
// Database user
$uname = "root";
// Database user password
$passwd = "sas@1234";


$conn = mysqli_connect('localhost', $uname,$passwd,$database);
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

// API Key value
$api_key_value = "5a1m1_4Lw4y5pr0t3ct3d8yth34Lm19hty";

$api_key = $nama_pelajar = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $nama_pelajar = test_input($_POST["nama_pelajar"]);
         
        // Create connection
        $conn = new mysqli('localhost', $uname, $passwd, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO iog_in_pelajar (nama_pelajar)
        VALUES ('".$nama_pelajar."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
