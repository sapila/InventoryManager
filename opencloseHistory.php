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

		$sqlorder = "SELECT COUNT(id) AS count,
					   SUM(totalprice) AS dayincome,
					   SUM(discount) AS daydiscount FROM clientOrder WHERE openclose_id=".$row['id'];

		$orderResult = $conn->query($sqlorder);
		$day = $orderResult->fetch_assoc();

         echo "<div class='orderList' onclick='clientHistoryOrders(".$row['id'].")' >
         			<span style='float:left'>".$row["opendate"]. " <br> ".$row['closedate'] ." </span>
         			<span style='padding-left:40px;'>Παραγγελειες : ".$day['count']." </span>
         			<span style='float:right'>
         			  Κοστος : ".$day["dayincome"]."<br>
         			  Εκπτωση : ".$day["daydiscount"]."</span><br><br></div>";
}
echo '</div></div>'
?>

<script>

function clientHistoryOrders(id){
	window.location.href = "opencloseHistoryOrders.php?id="+id;
}

</script>
<?php include 'footer.php';?>