<?php
// require __DIR__ . '/../../config/database.php';
class User {
    public $conn;

    public function register($username, $email, $password, $role) {
        if (empty($username) || empty($email) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Format d'email invalide.");
        }
    
        $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
    
        // Check if email already exists
        $checkQuery = "SELECT COUNT(*) FROM Users WHERE email = :email";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->execute([
            "email" => $email
        ]);
        $emailExists = $checkStmt->fetchColumn();
    
        if ($emailExists) {
            $_SESSION['error_message'] = "Cet email est déjà utilisé.";
            header("Location: http://localhost/Youdemy-learning/View/auth/register.php");
            exit();
        }
    
        // email exist => ... continue 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO Users (username, email, password, role)
                  VALUES (:username, :email, :password, :role)";
        try {
            $stml = $conn->prepare($query);
            $stml->execute([
                "username" => $username,
                "email" => $email,
                "password" => $hashed_password,
                "role" => $role,
            ]);
    
            $baseUrl = "http://" . 'localhost' . "/Youdemy-learning/View/courses/catalog.php";
            header("Location: $baseUrl");
            exit();
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
            header("Location: http://localhost/Youdemy-learning/View/auth/register.php");
            exit();
        }
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