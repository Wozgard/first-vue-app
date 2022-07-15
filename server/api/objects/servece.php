<?php
class Servece
{
    // подключение к базе данных и таблице 'servece'
    private $connect;
    private $table_name = 'servece';

    public $id;
    public $name;
    public $type;
    public $description;
    public $price;
    public $photo_video_id;
    public $portfolio_id;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    function read()
    {
        $query = 'SELECT' . $this->table_name . 'DESC';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function create()
    {
        $query = 'INSERT INTO' . $this->table_name . 'SET name=:name, type=:type description=:description, price=:price, photo_video_id=:photo_video_id, portfolio_id=:portfolio_id';
    }
}
