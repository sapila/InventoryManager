<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>

<?php 


	$sql = "SELECT * FROM clientOrder 
			INNER JOIN pelates ON clientOrder.client_id = pelates.id 
			WHERE clientOrder.id=". $_GET['id']."";

	 $result = $conn->query($sql);

	 $clientOrder = $result->fetch_assoc();
?>
	 	<div class="container">
	 			<div class="col-xs-6">
	 				<?php echo $clientOrder['firstname']. ' ' . $clientOrder['lastname'] .'<br>
	 							ΑΦΜ : '. $clientOrder['afm'] .'<br>
	 							ΔΟΥ : '. $clientOrder['doy'] ; ?>
	 			</div>
	 			<div class="col-xs-6">
	 				<?php echo $clientOrder['address']. ' ' . $clientOrder['town'] . '<br>' . $clientOrder['phone'];?>
	 			</div>
	 		</div>
	 		<hr>

<?php 

	$sql = "SELECT * FROM clientOrderProducts 
			INNER JOIN products ON clientOrderProducts.product_id = products.id 
			WHERE clientOreder_id=".$_GET['id'];

	 $result = $conn->query($sql);

	 echo '<div class="container">
	 		<div class="col-xs-12"><br>';

		  while($row = $result->fetch_assoc()) {
		  	 echo '<div class="row">';

			  	 echo '<div class="col-xs-7">';
		          //print_r($row);
		          echo $row['name'];
				 echo '</div>';
				 echo '<div class="col-xs-5">';
		          //print_r($row);
		          echo "Κουτιά :&nbsp;&nbsp;&nbsp;&nbsp;" . $row['boxbought'] ."<br> Τεμάχια :&nbsp; " . $row["itembought"];
				 echo '</div>';
			 echo '</div><br>';
	      }

      echo '</div>
      	 </div><hr>';

$finalPrice = $clientOrder["totalprice"] - $clientOrder["discount"];

echo '<div class="container">
		<div class="col-xs-12">
			Συνολικό κόστος : ' . $clientOrder["totalprice"]. '€ <br>
			Έκπτωση : ' . $clientOrder["discount"]. ' €<br><br>
			Τελικό κόστος : ' . $finalPrice .'€

		</div>
	  </div>';

?>

<?php include 'footer.php';?>