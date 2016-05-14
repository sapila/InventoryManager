<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<?php
$sql = "SELECT * FROM openclose GROUP BY opendate DESC";

$result = $conn->query($sql);

//fetch tha data from the database
echo '<div class="container">
		<div class="col-sm-12">';
while($row = $result->fetch_assoc()) {

		$sqlorder = "SELECT COUNT(id) AS count FROM supplyOrder WHERE openclose_id=".$row['id'];

		$orderResult = $conn->query($sqlorder);
		$day = $orderResult->fetch_assoc();

         echo "<div class='orderList' onclick='inventoryHistoryOrders(".$row['id'].")' >
         			<span style='float:left'>".$row["opendate"]. " <br> ".$row['closedate'] ." </span>
         			<span style='padding-left:40px;'>Παραγγελειες Αποθηκης: ".$day['count']." </span>
         			<br><br></div>";
}
echo '</div></div>'
?>

<script>

function inventoryHistoryOrders(id){
	window.location.href = "inventoryHistoryOrders.php?id="+id;
}

</script>

<?php include 'footer.php';?>