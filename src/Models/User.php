<?php
// require __DIR__ . '/../../config/database.php';
class User {
    public $conn;

    public function register($username, $email, $password, $role) {
        $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO Users (username,email, password, role)
        values (:username, :email, :password, :role)";
        $stml = $conn->prepare($query);
        $stml->execute([
            "username" => $username,
            "email" => $email,
            "password" => $hashed_password,
            "role" => $role,
        ]);
    }

    public function login($email, $password) {
        $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM Users
        WHERE email = :email AND password = :password";
        $stml = $conn->prepare($query);
        $stml->execute([
            "email" => $email,
            "password" => $hashed_password,
        ]);
        $user = $stml->fetch();
        if (password_verify($password,$user['password'])) {
            header('location: Course.php');
        }
    }
}

// $driss = new User();