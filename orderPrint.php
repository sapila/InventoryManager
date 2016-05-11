<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>

<?php 


	$sql = "SELECT * FROM clientOrder 
			INNER JOIN pelates ON clientOrder.client_id = pelates.id 
			INNER JOIN clientOrderProducts ON clientOrder.id = clientOrderProducts.clientOreder_id 
			WHERE clientOrder.id=". $_GET['id']."";

	 $result = $conn->query($sql);

	 $row = $result->fetch_assoc();
	 echo $row['firstname'];
	  while($row = $result->fetch_assoc()) {
          print_r($row);
      }


echo '<div class="container"> Hello ' . $_GET["id"]. '!</div>';

?>

<?php include 'footer.php';?>