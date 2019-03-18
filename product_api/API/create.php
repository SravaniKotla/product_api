<?php
//rest api need these headers, //* to set it to public 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
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

if(
    !empty($data->Name) &&
    !empty($data->Price)
){

$product->Name = $data->Name;
$product->Price = $data->Price;

//create Product

if($product->create()){
	// set response code - 201 created
    http_response_code(201);
	echo json_encode(
		array('message' => 'Product Created')
	);
}
	//Unable to create throw error
	else {
	// set response code - 503 service unavailable
    http_response_code(503);
		
	echo json_encode(
		array('message' => 'Product Not Created')
	);
		
	
}
	//data incomplete
}else{
	// set response code - 400 bad request
    http_response_code(400);
	
	echo json_encode(
		array('message' => 'Product Not Created')
	);
	
	
}
	