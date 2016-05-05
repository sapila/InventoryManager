<?php include '../../dbConnection.php';?>

<?php
session_start();

//update products
//insert into client order products
//add cost and discount at client Order

$postdata = file_get_contents("php://input");
$data = json_decode($postdata);
$order = $data->order;
$errorFlag = false;



 $sql = "INSERT INTO clientOrder (openclose_id,orderdate) VALUES (".$_SESSION['openclose_id'].",now())" ;


   if (!$conn->query($sql) === TRUE) {
        $errorFlag = true ;
    }

$clientOrder_id = $conn->insert_id;


foreach ($order as $product) {

	$sql = "INSERT INTO clientOrderProducts (clientOreder_id,product_id,boxbought,itembought)
			VALUES (".$clientOrder_id.",".$product->product_id.",".$product->boxbought.",".$product->itembought.")";


   if (!$conn->query($sql) === TRUE) {
        $errorFlag = true ;
        echo mysql_error() . '<br>';
        echo "test echo : ".$clientOrder_id.",".$product->product_id.",".$product->boxbought.",".$product->itembought."";
    }


   $sql = "UPDATE products SET 
    		boxreverse=".$product->boxleft.",
    		itemreverse=".$product->itemleft."
    		WHERE id=".$product->product_id;


   if (!$conn->query($sql) === TRUE) {
        $errorFlag = true ;
    }
}


	$arr = array('error' => $errorFlag);

	echo json_encode($arr);



 //echo "in sumbit re " . $product->product_name . " items";

?>