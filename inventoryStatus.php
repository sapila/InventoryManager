<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>

<?php 

 $sql = " SELECT * FROM products WHERE boxreverse>0 OR itemreverse>0 ";
  $result = $conn->query($sql);
  ?> 

	<div class="container">
		<div class="col-xs-12">
		<br>
		Διαθεσημα Προιοντα :
		<?php 
			  //fetch tha data from the database 
			  while($row = $result->fetch_assoc()) {
			         
			          echo "<div class='productList'>".$row["name"]. " <br> 
			          Κουτια : " . $row["boxreverse"]. "     <span style='padding-left:40px'> Τεμαχια : ".$row["itemreverse"]."</span> </div>";

			      }

		?>
		</div>
	</div>


<?php include 'footer.php';?>