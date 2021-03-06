<?php include '../dbConnection.php';?>
<?php
// sql to create table
$sql = "CREATE TABLE pelates (
    id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    type VARCHAR(30) NOT NULL,
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

// sql to create table
$sql = "CREATE TABLE supplyOrder (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    openclose_id INT(6) UNSIGNED NOT NULL,
    orderdate DATETIME DEFAULT NULL,
    FOREIGN KEY (openclose_id) REFERENCES openclose(id)
)";

if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}

// sql to create table
$sql = "CREATE TABLE supplyOrderProducts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    supplyOreder_id INT(6) UNSIGNED NOT NULL,
    product_id INT(6) UNSIGNED NOT NULL,
    boxreverse INT(6) NOT NULL,
    itemreverse INT(6) NOT NULL,
    FOREIGN KEY (supplyOreder_id) REFERENCES supplyOrder(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}

// sql to create table
$sql = "CREATE TABLE clientOrder (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    openclose_id INT(6) UNSIGNED NOT NULL,
    orderdate DATETIME DEFAULT NULL,
    client_id INT(6) UNSIGNED NOT NULL,
    totalprice  DECIMAL(10, 2) NOT NULL,
    discount DECIMAL(10, 2) NOT NULL,

    FOREIGN KEY (openclose_id) REFERENCES openclose(id)
)";

if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}

// sql to create table
$sql = "CREATE TABLE clientOrderProducts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    clientOreder_id INT(6) UNSIGNED NOT NULL,
    product_id INT(6) UNSIGNED NOT NULL,
    boxbought INT(6) NOT NULL,
    itembought INT(6) NOT NULL,
    
    FOREIGN KEY (clientOreder_id) REFERENCES clientOrder(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

if($conn->query($sql) == TRUE)
{
  echo 'Table created successfully\n'. '<br>';
}else{
  echo 'Could not create table: ' . mysql_error() . '<br>';
}

mysql_close($conn);

?>