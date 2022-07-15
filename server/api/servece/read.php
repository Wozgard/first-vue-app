<?php
// необходимые HTTP-заголовки
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

// подключение базы данных и файл, содержащий объекты
include_once '../config/database.php';
include_once '../objects/servece.php';

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// инициализируем объект
$servece = new Servece($db);

$stmt = $servece->read();
$num = $stmt->rowCount();

if ($num > 0) {
    $servece_arr = array();
    $servece_arr['records'] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $servece_item = array(
            'id' => $id,
            "name" => $name,
            'description' => html_entity_decode($description),
            'price' => $price,
            'photo_video_id' => $photo_video_id,
            'portfolio_id' => $portfolio_id
        );

        array_push($servece_arr['records'], $servece_item);
    }

    http_response_code(200);

    echo json_encode($servece_arr);
} else {
    http_response_code(404);
    json_encode(array('message' => 'Servece not found'), JSON_UNESCAPED_UNICODE);
}
