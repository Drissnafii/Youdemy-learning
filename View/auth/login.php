<?php
    require __DIR__ . '/../../src/Models/User.php';
    if (isset($_POST['login'])) {
        # code...
        $Driss = new User();
        // print_r($Driss);
        $Driss->login($_POST['email'], $_POST['password']);
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
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit" name="login">login</button>
    <p>Don't have an account? <a href="register.php">Create one here</a>.</p>
</form>
</body>
</html>