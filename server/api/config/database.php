<?php
class Database
{
    private $host = 'localhost';
    private $db_name = 'mini_serega';
    private $username = 'svayt';
    private $password = '9113';
    public $connect;

    public function getConnection()
    {
        $this->connect = null;

        try {
            $this->connect = new PDO('pgsql:host=' . $this->host . ';port=5432;dbname=' . $this->db_name, $this->username, $this->password);
            $this->connect->exec('set names utf8');
        } catch (PDOException $exeption) {
            echo 'Connection error: ' . $exeption->getMessage();
        }

        return $this->connect;
    }
}
