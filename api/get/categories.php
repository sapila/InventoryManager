<?php include '../../dbConnection.php';?>

<?php

$sql = "SELECT * FROM categories ";

$result = $conn->query($sql);

$rows = array();
//fetch tha data from the database
while($row = $result->fetch_assoc()) {
        $rows[] = $row;
}

echo json_encode($rows);

?>