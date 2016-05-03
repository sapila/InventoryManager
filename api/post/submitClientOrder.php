<?php include '../../dbConnection.php';?>

<?php
session_start();

$postdata = file_get_contents("php://input");
$order = json_decode($postdata);

$errorFlag = false;

//echo $order->order[0]->boxcount;


// $sql = "INSERT INTO clientOrder (openclose_id,orderdate) VALUES (".$_SESSION['openclose_id'].",now())" ;


//    if (!$conn->query($sql) === TRUE) {
//         $errorFlag = true ;
//     }

// $supplyOrder_id = $conn->insert_id;


// foreach ($order as $product) {

// 	$sql = "INSERT INTO supplyOrderProducts (supplyOreder_id,product_id,boxreverse,itemreverse)
// 			VALUES (".$supplyOrder_id.",".$product->product_id.",".$product->boxcount.",".$product->itemcount.")";


//    if (!$conn->query($sql) === TRUE) {
//         $errorFlag = true ;
//         echo mysql_error() . '<br>';
//     }


//    $sql = "UPDATE products SET 
//     		boxreverse=boxreverse+".$product->boxcount.",
//     		itemreverse=itemreverse +".$product->itemcount." 
//     		WHERE id=".$product->product_id;


//    if (!$conn->query($sql) === TRUE) {
//         $errorFlag = true ;
//     }
// }


	// $arr = array('error' => $errorFlag);

	// echo json_encode($arr);



 //echo "in sumbit re " . $product->product_name . " items";

?>