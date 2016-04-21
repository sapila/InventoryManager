<?php include '../dbConnection.php';?>
<?php
// sql to create table
$sql = "CREATE TABLE pelates (
    id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    town VARCHAR(30) NOT NULL,
    address VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    afm VARCHAR(30) NOT NULL,
    doy VARCHAR(30) NOT NULL
)";


if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}

// sql to create table
$sql = "CREATE TABLE categories (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
)";


if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}


// sql to create table
$sql = "CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    town VARCHAR(30) NOT NULL,
    address VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    afm VARCHAR(30) NOT NULL,
    doy VARCHAR(30) NOT NULL
)";

if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}

mysql_close($conn);

?>