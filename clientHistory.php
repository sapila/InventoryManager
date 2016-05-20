<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<?php
$sql = "SELECT * FROM pelates ";

$result = $conn->query($sql);

//fetch tha data from the database
echo '<div class="container">
		<div class="col-sm-12">';
while($row = $result->fetch_assoc()) {
         echo "<div class='orderList' onclick='clientHistoryOrders(".$row['id'].")' ><span style=''>".$row["firstname"]. " " . $row["lastname"]. " " . $row["type"]. "</span><span style='float:right'>".$row['town'] ." ".$row['address']." </span></div>";
}
echo '</div></div>'
?>

<script>

function clientHistoryOrders(id){
	window.location.href = "clientHistoryOrders.php?id="+id;
}

</script>
<?php include 'footer.php';?>