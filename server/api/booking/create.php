<?php
// HTTP-headers for send message to front-end
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Includes
include_once '../config/database.php';
include_once '../objects/customer.php';

$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

$data = json_decode(file_get_contents('php://input'));

if (!empty($data->name) && !empty($data->mail) && !empty($data->phone)) {
    $customer->name = $data->name;
    $customer->mail = $data->mail;
    $customer->phone = $data->phone;

    if ($customer->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "Customer create complite."), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Cannot create customer."), JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Cannot create customer. Data isn't full."), JSON_UNESCAPED_UNICODE);
}
