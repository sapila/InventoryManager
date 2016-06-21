<?php
$servername = "localhost";
$username = "root";//"u405593292_nik";
$password = "root";//"kwdikos";
$dbname = "baceacake";//"u405593292_basi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




?>
