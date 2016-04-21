<?php include '../dbConnection.php';?>
<?php

// sql to create table
$sql = "DROP TABLE pelates ";

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  echo 'Could not delete table: ' . mysql_error() . '<br>';
}else{
  echo 'Table deleted successfully\n'. '<br>';
}

// sql to create table
$sql = "DROP TABLE categories";

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  echo 'Could not delete table: ' . mysql_error() . '<br>';
}else{
  echo 'Table deleted successfully\n'. '<br>';
}

mysql_close($conn);

?>