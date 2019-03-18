<?php
//rest api need these headers, //* to set it to public 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//db Connection
include_once '../config/Database.php';
include_once '../objects/Product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);

// query products
$stmt = $product->read();
//get row count
$num = $stmt->rowCount();
 
// check for products in the db product table
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr['records']=array();
	
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
            $product_item=array(
            "ID" => $ID, 
			"Name" => $Name,
            "Price" => $Price,
        );
        //push to the "records"
 
        array_push($products_arr['records'], $product_item);
    }
 
    // set response code - 200 OK-Success
    http_response_code(200);
 
    //convert products data to JSON format
    echo json_encode($products_arr);
}
else
{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
