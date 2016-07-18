<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<?php

 if(isset($_POST['SubmitButton'])){ //check if form was submitted

    // sql to delete a record
    $sql = "DELETE FROM pelates WHERE id=".$_POST["id"]." ";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success"> Η διαγραφή ηταν επιτυχής </div>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
 }
?>

 <div class="container">

     <a class="btn btn-default" style="margin-top:5px;margin-bottom:5px;" href="createClient.php">Καταχώρηση Νέου</a>
<br><br>

<?php
$sql = " SELECT * FROM pelates ";
$result = $conn->query($sql);
//fetch tha data from the database
while($row = $result->fetch_assoc()) {
        echo '<div class="row productList">';
        echo '<strong><div class="col-xs-4"> ' . $row['firstname']. ' ' . $row['lastname']. '<br> ' . $row['type']. '<br>' . $row['phone']. '</div>';
        echo '<div class="col-xs-4"> ' . $row['address']. '<br> ' . $row['town']. '</div>';
        echo '<div class="col-xs-3"> ΑΦΜ:' . $row['afm']. '<br>ΔΟΥ:' . $row['doy']. '</div>';
        echo '<div class="col-xs-1">
                <form action="" method="POST">
                    <input type="hidden" value="' . $row['id']. '" name="id" />
                    <button type="submit" class="btn btn-default"  name="SubmitButton"  onclick="return confirm(\'Are you sure?\')">
                        X
                    </button>
                </form>
                <form action="clientEdit.php" method="GET" style="margin-top:5px;">
                    <input type="hidden" value="' . $row['id']. '" name="id" />
                    <button type="submit" class="btn btn-default"  name="EditButton" value="edit">
                        Edit
                    </button>
                </form>
               </div>';
        echo '</div></strong><br>';
    }

?>





    </div><!-- /.container -->

<?php include 'footer.php';?>
