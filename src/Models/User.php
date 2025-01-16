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
        $baseUrl = "http://" . 'localhost' . "/Youdemy-learning/View/courses/catalog.php";
        header("location: $baseUrl");
    }

    public function login($email, $password) {
        $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
        $query = "SELECT * FROM Users WHERE email = :email";
        $stml = $conn->prepare($query);
        $stml->execute([
            "email" => $email
        ]);
        $user = $stml->fetch();
        if ($user) {
            if ($user["Email"] === "admin@gmail.com") {
                if (password_verify($password, $user['Password'])) {
                    $adminDashPage = "http://" . 'localhost' . "/Youdemy-learning/View/admin/dashboard.php";
                    header("location: $adminDashPage");
                    exit();
                }
                echo "password of A, is incorrect";
            }
            
            $teacherEmails  = array(
                "teacher02@gmail.com", 
                "teacher03@gmail.com"
                );
            if (in_array($user["Email"], $teacherEmails)) {
                if (password_verify($password, $user['Password'])) {
                    $teacherDash = "http://" . 'localhost' . "/Youdemy-learning/View/courses/teacherDash.php";
                    header("location: $teacherDash");
                    exit();
                }
            }
            if (password_verify($password, $user['Password'])) {
                $catalogPage = "http://" . 'localhost' . "/Youdemy-learning/View/courses/catalog.php";
                header("location: $catalogPage");
            }
        }
        echo "Les donne est incorrect";
    }
}

// $driss = new User();