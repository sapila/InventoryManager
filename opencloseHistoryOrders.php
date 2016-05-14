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
	  $sql = " SELECT *,clientOrder.id AS order_id FROM clientOrder INNER JOIN pelates ON pelates.id = clientOrder.client_id WHERE openclose_id=" .$openclose_id ." ";
	  $result = $conn->query($sql);
	  //fetch tha data from the database 
	  $total = 0;
	  while($row = $result->fetch_assoc()) {
	          $price = $row["totalprice"] - $row["discount"];
	          echo "<div class='orderList' onclick='printOrder(".$row['order_id'].")' ><span style=''>".$row["firstname"]. " " . $row["lastname"]. " </span><span style='float:right'>".$price." €</span></div>";
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