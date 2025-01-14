<?php
require __DIR__ . '/../../config/database.php';
class User {
    private int $userID;
    private string $username;
    private string $password;
    private string $email;
    private string $role;
    private Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function register(string $username, string $password,string $email, string $role = 'student') {
        if (empty($username) || empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoire.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Forma d'email invalide.");
        }

        
    }
}