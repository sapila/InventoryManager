<?php
$servername = "localhost";
$username = "u405593292_nik";
$password = "kwdikos";
$dbname = "u405593292_basi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




?>
