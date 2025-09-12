<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$host = "localhost";
$user = "root";   
$pass = "";       
$dbname = "php_porject";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("connection falied " . $conn->connect_error);
}
?>