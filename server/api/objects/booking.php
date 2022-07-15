<?php
class Booking
{
    // подключение к базе данных и таблице 'booking'
    private $connect;
    private $table_name = 'booking';

    public $id;
    public $type;
    public $customer_id;
    public $comment;
    public $portfolio_url;

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
        $query = 'INSERT INTO' . $this->table_name . 'SET name=:name, mail=:mail, phone=:phone';

        $stmt = $this->connect->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->mail = htmlspecialchars(strip_tags($this->mail));
        $this->phone = htmlspecialchars(strip_tags($this->phone));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":mail", $this->mail);
        $stmt->bindParam(":phone", $this->phone);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
