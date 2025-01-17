<?php
class Database {
    private string $host;
    private string $dbname;
    private string $user;
    private string $pass;
    private $conn;

    //ne sont acecibles qu 'a l'interireur de la class ell-meme

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'youdemy_db';
        $this->user = 'root';
        $this->pass = '';
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

}