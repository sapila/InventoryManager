<?php include '../dbConnection.php';?>
<?php

// sql to create table
$sql = "DROP TABLE pelates ";

if($conn->query($sql) == TRUE)
{
  echo 'Table deleted successfully\n'. '<br>';
}else{
  echo 'Could not delete table: ' . mysql_error() . '<br>';
}

// sql to create table
$sql = "DROP TABLE categories";

if($conn->query($sql))
{
  echo 'Table deleted successfully\n'. '<br>';
}else{
  echo 'Could not delete table: ' . mysql_error() . '<br>';
}


$sql = "DROP TABLE products";

if($conn->query($sql))
{
  echo 'Table deleted successfully\n'. '<br>';
}else{
  echo 'Could not delete table: ' . mysql_error() . '<br>';
}

mysql_close($conn);

?>