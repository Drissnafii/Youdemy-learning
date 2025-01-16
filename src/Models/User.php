<?php
<<<<<<< HEAD
include_once __DIR__ . '/../../config/database.php';
=======
// require __DIR__ . '/../../config/database.php';
>>>>>>> feature/user-model
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
        $baseUrl = "http://" . 'localhost' . "/Youdemy-learning/View/courses/catalog.php";
        header("location: $baseUrl");
    }

    public function login($email, $password) {
        $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
<<<<<<< HEAD
        $query = "SELECT * FROM Users
        WHERE email = :email";
=======
        $query = "SELECT * FROM Users WHERE email = :email";
>>>>>>> feature/user-model
        $stml = $conn->prepare($query);
        $stml->execute([
            "email" => $email
        ]);
        $user = $stml->fetch();
        if ($user) {
<<<<<<< HEAD
            if (password_verify($password, $user['Password'])) {
                $baseUrl = "http://" . 'localhost' . "/Youdemy-learning/View/courses/catalog.php";
                header("location: $baseUrl");
            }
        }
        echo "Les donne est incorrect";
    }
}

// $driss = new User();