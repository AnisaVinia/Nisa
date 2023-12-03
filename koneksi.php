<?php
$host = "127.0.0.1"; 
$username = "root"; 
$password = "root"; 
$database = "DBwijaya"; 

$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
} 
?>
