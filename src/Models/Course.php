<?php
require __DIR__ . '/../../config/database.php';

class Course {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllTags() {
        try {
            $query = "SELECT * FROM tags";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching tags: " . $e->getMessage());
        }
    }
}