<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
  <?php

//reset session variables...set openclose and openclose_id
  $sql = "SELECT * FROM openclose WHERE id=(SELECT MAX(id) FROM openclose) ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if($row["closedate"] ===null)
  {
    $_SESSION['inventory_open'] = true;
    $_SESSION['openclose_id'] = $row["id"];
  }

 if(isset($_POST['openInventory'])){ //check if form was submitted
  $_SESSION['inventory_open'] = true;

   $sql = "INSERT INTO openclose (opendate,closedate)
        VALUES (now(),null)";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['openclose_id'] = $conn->insert_id;
        echo '<div class="alert alert-success"> Η καταχώρηση ηταν επιτυχής '.$_SESSION['openclose_id'].' </div>';
    } else {
        echo '<div class="alert alert-danger"> Error: ' . $sql . '<br>' . $conn->error .'</div>';
    }


}

 if(isset($_POST['closeInventory'])){ //check if form was submitted

   $sql = "UPDATE openclose SET closedate=now() WHERE id=".$_SESSION['openclose_id'];

   if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success"> Η καταχώρηση ηταν επιτυχής '.$_SESSION['openclose_id'].' </div>';
    } else {
        echo '<div class="alert alert-danger"> Error: ' . $sql . '<br>' . $conn->error .'</div>';
    }

  unset($_SESSION['openclose_id']);
  unset($_SESSION['inventory_open']);

}

?>

<div class="container">

<?php
    if(isset($_SESSION['inventory_open'])):?>
      <br>

         <div class="row">
              <div style="padding:20px;background-color:#eee;display:inline;" class="col-xs-4">
                <a href="clientOrder.php"  class="" >Παραγγελία Πελάτη</a>
              </div>
              <div style="padding:20px;background-color:#eee;display:inline;" class="col-xs-4">
                <a href="inventoryOrder.php" class="" >Παραγγελία Αποθήκης</a>
              </div>
              <div style="padding:20px;background-color:#eee;display:inline;" class="col-xs-4">
                <a href="inventoryStatus.php" class="" >Έλεγχος Αποθήκης</a>
           </div>
        </div>

    <?php
    else:?>

        <h1>close</h1>
        <form action="" method="post">
          <button type="submit" class="btn btn-primary" name="openInventory">Άνοιγμα</button>
        </form>

    <?php endif;
?>




<div class="col-sm-12">
 <br>
 Παραγγελιες Ημερας :
  <?php
  $sql = " SELECT *,clientOrder.id AS order_id FROM clientOrder INNER JOIN pelates ON pelates.id = clientOrder.client_id WHERE openclose_id=" .$_SESSION['openclose_id']." ";
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
<script>

function printOrder(id){
  window.location.href = "orderPrint.php?id="+id;
}
</script>

          <form action="" method="post">
              <button type="submit" class="btn btn-primary" name="closeInventory">Κλείσιμο Ημερας</button>
            </form>
            <br>

    </div><!-- /.container -->

<?php include 'footer.php';?>
