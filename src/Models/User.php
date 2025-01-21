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
    
        // email not exist => ... continue 
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
    
            $this->login($email,$password);
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
 
            if ($user && password_verify($password, $user['Password'])) {
                session_start();

                $_SESSION["userId"]=$user["UserID"];
                $_SESSION["role"]=$user["Role"];
                

                if($user["Role"]==="admin"){
                    $adminPage = "http://" . 'localhost' . "/Youdemy-learning/View/admin/dashboard.php";
                    header("location: $adminPage");

                }else if($user["Role"]==="teacher"){
                    echo "teacher";
                    $teacherPage = "http://" . 'localhost' . "/Youdemy-learning/View/courses/teacherDash.php";
                    header("location: $teacherPage");

                }else if($user["Role"]==="student"){
                    $catalogPage = "http://" . 'localhost' . "/Youdemy-learning/View/courses/catalog.php";
                    header("location: $catalogPage");
                }else{

                }
                
            }
        return "Les donne est incorrect";
    }
}

// $driss = new User(); 