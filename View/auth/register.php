<?php
    require __DIR__ . '/../../src/Models/User.php';
    if (isset($_POST['register'])) {
        # code...
        $Driss = new User();
        $Driss->register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role']);
        echo "inserted successfully !";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <h2>Inscription</h2>
    <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <select name="role" id="role" require>
        <option value="student">student</option>
        <option value="teacher">teacher</option>
        <option value="admin">admin</option>
    </select>
    <button type="submit" name="register">S'inscrire</button>
</form>
</body>
</html>