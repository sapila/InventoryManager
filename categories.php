<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<?php

 if(isset($_POST['createCategory'])){ //check if form was submitted
 
 $sql = "INSERT INTO categories (name)
        VALUES ('".$_POST['category']."')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success"> Η καταχώρηση ηταν επιτυχής </div>';
    } else {
        echo '<div class="alert alert-danger"> Error: ' . $sql . '<br>' . $conn->error .'</div>';
    }
} 
if(isset($_POST['deleteCategory'])){ //check if form was submitted
 
    // sql to delete a record
    $sql = "DELETE FROM categories WHERE id=".$_POST["id"]." ";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success"> Η διαγραφή ηταν επιτυχής </div>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
 }

?>

<div class="container">
  
<form action="" method="post">
<fieldset class="form-group">
    <label for="category">Όνομα κατηγορίας</label>
    <input class="form-control" type="text" name="category"/>
   </fieldset> 
    <button type="submit" class="btn btn-primary" name="createCategory">Καταχώρηση</button>
</form>
<br>

<?php
$sql = " SELECT * FROM categories ";
$result = $conn->query($sql);
//fetch tha data from the database
while($row = $result->fetch_assoc()) {
        echo '<div class="row orderList">';
        echo '<strong><div class="col-xs-10"> '. $row['name']. '</div>';
        echo '<div class="col-xs-2">
                <form action="" method="post">
                    <input type="hidden" value="' . $row['id']. '" name="id" />
                    <button type="submit" class="btn btn-default" name="deleteCategory"  onclick="return confirm(\'Are you shure?\')">
                        X
                    </button>
                </form>
               </div>';
        echo '</div></strong>';
    }

?>

</div>


<?php include 'footer.php';?>