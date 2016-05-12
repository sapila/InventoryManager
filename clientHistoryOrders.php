<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<?php
$sql = "SELECT * FROM clientOrder WHERE client_id=".$_GET['id']." ORDER BY orderdate DESC ";

$result = $conn->query($sql);

//fetch tha data from the database
echo '<div class="container">
		<div class="col-sm-12">';
while($row = $result->fetch_assoc()) {
         echo "<div class='orderList' onclick='printOrder(".$row['id'].")' ><span style=''>".$row["orderdate"]. " </span><span style='float:right'> Κοστος : " . $row["totalprice"]. "€  <br>Εκπτωση :".$row['discount'] ." € </span><br><br></div>";
}
echo '</div></div>'
?>

<script>
function printOrder(id){
  window.location.href = "orderPrint.php?id="+id;
}
</script>
<?php include 'footer.php';?>