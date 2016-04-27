<?php include '../../dbConnection.php';?>

<?php
session_start();

$postdata = file_get_contents("php://input");
$order = json_decode($postdata);

$errorFlag = false;
foreach ($order as $product) {

    $sql = "UPDATE products SET 
    		boxreverse=boxreverse+".$product->boxcount.",
    		itemreverse=itemreverse +".$product->itemcount." 
    		WHERE id=".$product->product_id;


   if (!$conn->query($sql) === TRUE) {
        $errorFlag = true ;
    }
}


	$arr = array('error' => $errorFlag);

	echo json_encode($arr);



 //echo "in sumbit re " . $product->product_name . " items";

?>