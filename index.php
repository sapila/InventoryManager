<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
  <?php
 
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

            <h1>open</h1>
      
            <form action="" method="post">
              <button type="submit" class="btn btn-primary" name="closeInventory">Κλείσιμο</button>
            </form>
            <br> 
          <div class="col-xs-12">

              <a href="clientOrder.php" type="submit" class="btn btn-primary" name="closeInventory">Παραγγελία Πελάτη</button>

              <a href="inventoryOrder.php" class="btn btn-primary" >Παραγγελία Αποθήκης</a>

              <button type="submit" class="btn btn-primary" name="closeInventory">Έλεγχος Αποθήκης</button>

        </div>
    <?php    
    else:?>

        <h1>close</h1>
        <form action="" method="post">
          <button type="submit" class="btn btn-primary" name="openInventory">Άνοιγμα</button>
        </form>

    <?php endif; 
?>





<?php
$sql = " SELECT * FROM pelates ";
$result = $conn->query($sql);
//fetch tha data from the database
while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }

?> 

    </div><!-- /.container -->

<?php include 'footer.php';?>