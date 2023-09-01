<?php
// code to conncet to the database
/*
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "healthify";

$conn = mysqli_connect($servername, $username, $password, $database_name);
if(!$conn){
    die("Unable to conncet");
}else{
    // echo "Connected to the database.";
}

*/


$servername = "remotemysql.com";
$username = "uQsU1tfWOe";
$password = "aFyN3vVJKe";
$database_name = "uQsU1tfWOe";

$conn = mysqli_connect($servername, $username, $password, $database_name);
echo $conn;
if(!$conn){
    die("Unable to conncet");
}else{
    // echo "Connected to the database.";
}

?>