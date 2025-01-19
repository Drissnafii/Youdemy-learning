<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        form {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1), 0 0 40px #6b46c1 inset; /* Added shadow with color */
            width: 100%;
            max-width: 400px;
            animation: fadeInUp 1s ease-out;
        }

        h2 {
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 1.8rem;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 1rem;
            color: #666;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            background-color: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
            animation: fadeInUp 0.5s ease-out;
        }

        .success-message {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <?php
        require __DIR__ . '/../../src/Models/User.php';
        session_start();
        
        if (isset($_SESSION['error_message'])) {
            echo "<div class='error-message'>" . $_SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']);
        }
        
        if (isset($_POST['login'])) {
            $Driss = new User();
            $Driss->login($_POST['email'], $_POST['password']);
        }
    ?>
    <form method="post">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="register.php">Create one here</a></p>
    </form>
</body>
</html>