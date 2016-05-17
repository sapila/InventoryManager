<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<?php
$openclose_id = $_GET['id'];

?>

<div class="container">
	<div class="col-sm-12">
	 <br>
	 Παραγγελιες Ημερας :
	  <?php
	  $sql = " SELECT *,supplyOrder.id AS order_id,supplyOrderProducts.boxreverse AS boxbought,supplyOrderProducts.itemreverse AS itembought
	  			 FROM supplyOrder 
	  			 INNER JOIN supplyOrderProducts ON supplyOrderProducts.supplyOreder_id = supplyOrder.id
	  			 INNER JOIN products ON products.id = supplyOrderProducts.product_id
	  			 WHERE supplyOrder.openclose_id=" .$openclose_id ."
	  			  ";

	  $result = $conn->query($sql);
	  //fetch tha data from the database 
	  while($row = $result->fetch_assoc()) {
//print_r($row);
	          echo "<div class='orderList'><span style='padding:5px;'>".$row["name"]. " " . $row["boxbought"]. " </span><span style='float:right;'>Κουτιά : ".$row['boxbought']."<br>Τεμάχια : ".$row['itembought']."</span><br><br></div>";
	      
	      }

	  ?> 

	 </div>

 </div>

<?php include 'footer.php';?>