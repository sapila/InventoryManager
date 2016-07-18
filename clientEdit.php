<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<?php

$id = $_GET['id'];


if(isset($_POST['SubmitButton'])){ //check if form was submitted

  $updateSql = "UPDATE pelates SET firstname='".$_POST['firstname']."',
                                   lastname='".$_POST['lastname']."',
                                   type='".$_POST['type']."',
                                   town='".$_POST['town']."',
                                   address='".$_POST['address']."',
                                   phone='".$_POST['phone']."',
                                   afm='".$_POST['afm']."',
                                   doy='".$_POST['doy']."' WHERE id=".$id;


  if ($conn->query($updateSql) === TRUE) {
      echo '<div class="alert alert-success"> Η καταχώρηση ηταν επιτυχής </div>';
  } else {
      echo '<div class="alert alert-danger"> Error: ' . $sql . '<br>' . $conn->error .'</div>';;
  }

 }



$sql = " SELECT * FROM pelates where id=".$id;
$result = $conn->query($sql);
//fetch tha data from the database
$row = $result->fetch_assoc();


?>



<div class="container ">
 <div class=" col-md-6 col-centered">
     <h3><center><strong> Επεξεργασία πελάτη </strong></center></h3>
 <form action="" method="post">

  <fieldset class="form-group">
    <label for="firstname">Όνομα</label>
    <input class="form-control" type="text" name="firstname" value= <?php echo $row['firstname']; ?> />
   </fieldset>

    <fieldset class="form-group">
    <label for="lastname">Επίθετο</label>
    <input class="form-control" type="text" name="lastname" value= <?php echo $row['lastname']; ?> />
   </fieldset>

   <fieldset class="form-group">
    <label for="type">Τύπος Επιχείρησης</label>
    <input class="form-control" type="text" name="type" value= <?php echo $row['type']; ?> />
   </fieldset>

    <fieldset class="form-group">
    <label for="town">Πόλη</label>
    <input class="form-control" type="text" name="town" value= <?php echo $row['town']; ?> />
   </fieldset>

   <fieldset class="form-group">
    <label for="address">Διεύθυνση</label>
    <input class="form-control" type="text" name="address" value= <?php echo $row['address']; ?>  />
   </fieldset>

   <fieldset class="form-group">
    <label for="phone">Τηλέφωνο</label>
    <input class="form-control" type="text" name="phone" value= <?php echo $row['phone']; ?>  />
   </fieldset>

   <fieldset class="form-group">
    <label for="afm">ΑΦΜ</label>
    <input class="form-control" type="text" name="afm" value= <?php echo $row['afm']; ?> />
   </fieldset>

   <fieldset class="form-group">
    <label for="doy">ΔΟΥ</label>
    <input class="form-control" type="text" name="doy" value= <?php echo $row['doy']; ?> />
   </fieldset>



    <input type="submit" class="btn btn-primary" name="SubmitButton"/>

 </form>
 </div>
</div>
<br>
<?php


 ?>
 <?php include 'footer.php';?>
