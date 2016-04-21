<?php
$servername = "localhost";
$username = "root";
$password = "admin";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//select a database to work with
$db_selected = mysql_select_db("baceacake",$conn);
if (!$db_selected) {
    die ('Connection failed :' . mysql_error());
}


////execute the SQL query and return records
//$result = mysql_query("SELECT * FROM recipes");
////fetch tha data from the database
//while ($row = mysql_fetch_array($result)) {
//   echo "ID:".$row{'id'}." Name:".$row{'name'}." ".$row{'description'}."<br>";
//}


?>