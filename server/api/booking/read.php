<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

// подключение базы данных и файл, содержащий объекты
include_once '../config/database.php';
include_once '../objects/customer.php';

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

$customer = new Customer($db);

$stmt = $customer->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $customer_arr = array();
    $customer_arr['records'] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $customer_item = array(
            'id' => $id,
            "name" => $name,
            'mail' => $mail,
            'phone' => $phone
        );

        array_push($customer_arr['records'], $customer_item);
    }

    http_response_code(200);

    echo json_encode($customer_arr);
} else {
    http_response_code(404);
    json_encode(array('message' => 'customer not found'), JSON_UNESCAPED_UNICODE);
}
