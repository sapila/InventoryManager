<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
 

    <div class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

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