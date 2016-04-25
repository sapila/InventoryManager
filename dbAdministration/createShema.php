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
    boxprice DECIMAL(10, 2) NOT NULL,
    itemprice DECIMAL(10, 2) NOT NULL,
    categoryid INT(6) UNSIGNED NOT NULL,
    boxreverse INT(6) NOT NULL,
    itemreverse INT(6) NOT NULL,
    boxtoitem INT(6) NOT NULL,
    FOREIGN KEY (categoryid) REFERENCES categories(id)
)";

if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}


// sql to create table
$sql = "CREATE TABLE openclose (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    opendate DATETIME DEFAULT NULL,
    closedate DATETIME DEFAULT NULL
)";

if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}

mysql_close($conn);

?>