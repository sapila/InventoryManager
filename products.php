<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<?php
 
 if(isset($_POST['SubmitButton'])){ //check if form was submitted
 
    // sql to delete a record
    $sql = "DELETE FROM products WHERE id=".$_POST["id"]." ";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success"> Η διαγραφή ηταν επιτυχής </div>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
 }
?>



 <div class="container">
  
     <a class="btn btn-default" style="margin-top:5px;margin-bottom:5px;" href="createProduct.php">Καταχώρηση Νέου</a> 
<br><br>

<?php
$sql = " SELECT products.id ,
                products.name,
                products.boxprice,
                products.itemprice,
                products.boxtoitem,
                categories.name as category
          FROM products INNER JOIN categories ON products.categoryid = categories.id ";
          
$result = $conn->query($sql);
//fetch tha data from the database
while($row = $result->fetch_assoc()) {
        echo '<div class="row productList">';
        echo '<strong><div class="col-xs-4"> ' . $row['name']. '</div>';
        echo '<div class="col-xs-4"> ' . $row['category']. '</div>';
        echo '<div class="col-xs-3"> Πακέτο : ' . $row['boxprice']. '<br>Τεμάχιο :  ' . $row['itemprice']. '<br> τεμ/πακ :' . $row['boxtoitem']. '</div>';
        echo '<div class="col-xs-1">
                <form action="" method="post">
                    <input type="hidden" value="' . $row['id']. '" name="id" />
                    <button type="submit" class="btn btn-default" name="SubmitButton"  onclick="return confirm(\'Are you shure?\')">
                        X
                    </button>
                </form>
               </div>';
        echo '</div></strong>';
    }

?>

<?php include 'footer.php';?>