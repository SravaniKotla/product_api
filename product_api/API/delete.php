<?php
//rest api need these headers, //* to set it to public 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//db Connection
include_once '../config/Database.php';
include_once '../objects/Product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);

//Get the raw data

$data = json_decode(file_get_contents("php://input"));

//Set ID to update
$product->ID = $data->ID;

//Delete Product
if(
    !empty($data->ID)
){
if($product->delete()){
	// set response code - 200 ok
    http_response_code(200);
	echo json_encode(
		array('message' => 'Product Deleted')
	);
}
}else {
	// set response code - 503 service unavailable
    http_response_code(503);
	
	echo json_encode(
		array('message' => 'Product Not Deleted')
	);
}
	