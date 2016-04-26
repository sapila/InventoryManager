<?php include '../../dbConnection.php';?>

<?php

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE categoryid=".$id ;

$result = $conn->query($sql);

$rows = array();
//fetch tha data from the database
while($row = $result->fetch_assoc()) {
        $rows[] = $row;
}
echo json_encode($rows);

?>