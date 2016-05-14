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
	  $sql = " SELECT *,supplyOrder.id AS order_id
	  			 FROM supplyOrder 
	  			 INNER JOIN supplyOrderProducts ON supplyOrderProducts.supplyOreder_id = supplyOrder.id
	  			 INNER JOIN products ON products.id = supplyOrderProducts.product_id
	  			 WHERE supplyOrder.openclose_id=" .$openclose_id ."
	  			  ";

	  $result = $conn->query($sql);
	  //fetch tha data from the database 
	  $count = 0;
	  while($row = $result->fetch_assoc()) {
print_r($row);
	          echo "<div class='orderList' onclick='printOrder(".$row['order_id'].")' ><span style=''>".$row["name"]. " " . $row["boxbought"]. " </span><span style='float:right'>€</span></div>";
	          $total += $price;
	      }

	      echo "<div style='padding:50px;' class='text-right'>Συνολο : ".$total." €</div>";

	  ?> 

	 </div>

 </div>

<script>

function printOrder(id){
	 window.location.href = "orderPrint.php?id="+id;
}

</script>
<?php include 'footer.php';?>