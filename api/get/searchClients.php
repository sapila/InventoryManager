<?php include '../../dbConnection.php';?>

<?php

$search = $_GET["search"];
$sql = "SELECT * FROM pelates WHERE firstname LIKE '%".$search."%' ||
				    lastname LIKE '%".$search."%'  ||
				    type LIKE '%".$search."%'";

$result = $conn->query($sql);

$rows = array();
//fetch tha data from the database
while($row = $result->fetch_assoc()) {
        $rows[] = $row;
}

echo json_encode($rows);

?>

