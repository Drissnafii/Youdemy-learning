<?php
$config = require __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $db = new Database("localhost", "youdemy_db", "root", "");
    $conn = $db->getConnection();

    if ($conn) {
        echo "Database connected successfully !";
    }
    ?>
</body>
</html>