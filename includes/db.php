<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'hospital_management_system';  // must match your DB name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
