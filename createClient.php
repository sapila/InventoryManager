<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
 <?php
 
 if(isset($_POST['SubmitButton'])){ //check if form was submitted
 
 $sql = "INSERT INTO pelates (firstname, lastname, town, address, phone, afm, doy)
        VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['town']."',
        '".$_POST['address']."','".$_POST['phone']."','".$_POST['afm']."','".$_POST['doy']."')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success"> Η καταχώρηση ηταν επιτυχής </div>';
    } else {
        echo '<div class="alert alert-danger"> Error: ' . $sql . '<br>' . $conn->error .'</div>';
    }
} 

?>



<div class="container">
 <div class="col-md-6 col-sm-offset-3">
     <h3><center><strong> Καταχώρηση νέου πελάτη </strong></center></h3>
 <form action="" method="post">

  <fieldset class="form-group">
    <label for="firstname">Όνομα</label>
    <input class="form-control" type="text" name="firstname"/>
   </fieldset>
   
    <fieldset class="form-group">
    <label for="lastname">Επίθετο</label>
    <input class="form-control" type="text" name="lastname"/>
   </fieldset> 
   
    <fieldset class="form-group">
    <label for="town">Πόλη</label>
    <input class="form-control" type="text" name="town"/>
   </fieldset> 
   
   <fieldset class="form-group">
    <label for="address">Διεύθηνση</label>
    <input class="form-control" type="text" name="address"/>
   </fieldset> 
   
   <fieldset class="form-group">
    <label for="phone">Τηλέφωνο</label>
    <input class="form-control" type="text" name="phone"/>
   </fieldset> 
   
   <fieldset class="form-group">
    <label for="afm">ΑΦΜ</label>
    <input class="form-control" type="text" name="afm"/>
   </fieldset> 
   
   <fieldset class="form-group">
    <label for="doy">ΔΟΥ</label>
    <input class="form-control" type="text" name="doy"/>
   </fieldset> 
   
     
    
    <input type="submit" class="btn btn-primary" name="SubmitButton"/>
    
 </form>  
 </div>   
</div>
<br>



<?php include 'footer.php';?>