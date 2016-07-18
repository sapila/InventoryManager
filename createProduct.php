<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
 <?php

 if(isset($_POST['SubmitButton'])){ //check if form was submitted

 $sql = "INSERT INTO products (name, boxprice, itemprice, categoryid, boxreverse, itemreverse, boxtoitem)
        VALUES ('".$_POST['name']."', '".$_POST['boxprice']."', '".$_POST['itemprice']."',
        '".$_POST['categorySelection']."',0,0,'".$_POST['boxtoitem']."')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success"> Η καταχώρηση ηταν επιτυχής </div>';
    } else {
        echo '<div class="alert alert-danger"> Error: ' . $sql . '<br>' . $conn->error .'</div>';
    }
}

?>



<div class="container">
 <div class="col-md-6 col-centered">
     <h3><center><strong> Καταχώρηση νέου προιόντος </strong></center></h3>
 <form action="" method="post">

  <fieldset class="form-group">
    <label for="firstname">Όνομα προιόντος</label>
    <input class="form-control" type="text" name="name"/>
   </fieldset>
   <?php

    $sql = " SELECT * FROM categories ";
    $result = $conn->query($sql);
    echo "<select class=\"form-control\" name=\"categorySelection\">";
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id']. '">' . $row['name']. '</option>';
           echo '</div></strong><br>';
    }
    echo "</select>";
?>


    <fieldset class="form-group">
    <label for="boxprice">Τιμή κιβωτίου</label>
    <input class="form-control" type="text" name="boxprice"/>
   </fieldset>

   <fieldset class="form-group">
    <label for="itemprice">Τιμή τεμαχίου</label>
    <input class="form-control" type="text" name="itemprice"/>
   </fieldset>

   <fieldset class="form-group">
    <label for="boxtoitem">Τεμάχια ανα κβώτιο</label>
    <input class="form-control" type="text" name="boxtoitem"/>
   </fieldset>


    <input type="submit" class="btn btn-primary" name="SubmitButton"/>

 </form>
 </div>
</div>
<br>



<?php include 'footer.php';?>
