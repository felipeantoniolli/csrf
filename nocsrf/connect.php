<?php
$server = "127.0.0.1";
$dbname = "csrf";
$username = "root";
$password = "";

global $conn;

$conn = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>