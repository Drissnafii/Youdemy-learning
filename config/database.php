<?php
class Database {
    private string $host;
    private string $dbname;
    private string $user;
    private mixed $pass;
    private $conn;

    //ne sont acecibles qu 'a l'interireur de la class ell-meme

    public function __construct($host, $dbname, $user, $pass)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function connect() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            return $this->conn;
        } catch (PDOException $e) {
            die("Database connection failed." . $e->getMessage());
        }
    }

    public function getConnection() {
        if ($this->conn === null) {
            $this->connect();
        }
        return $this->conn;
    }
}