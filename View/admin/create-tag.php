
<?php
require __DIR__ . '/../../src/Models/Admin.php';
$Admin = new Admin();
if (isset($_POST['send-tag'])) {
    $Admin->sendTag($_POST['tag-input']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tag</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h2 { margin-bottom: 20px; }
        div { margin-bottom: 10px; }
         label { display: block; margin-bottom: 5px;}
       input[type="text"] { padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 15px; background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 4px; cursor: pointer; }
    button:hover { background-color: #e0e0e0; }
    </style>
</head>
<body>
    <h2>Create New Tag</h2>
    <form method="post">
        <div>
            <label for="name">Tag Name:</label>
            <input type="text" id="name" name="tag-input" required>
        </div>
        <button type="submit" name="send-tag">Add Tag</button>
    <p>You Wanna Creat A <a href="create-category.php">categoriy </a>?</p>
    </form>
    <div class="list-tages">
        <?php
        $Tags = $Admin->readTag();
        foreach ($Tags as $Tag) {
            # code...
            echo $Tag["Name"] . "<a href='delete-tag.php?id=". $Tag['TagID'].  "'>    delete</a> <br>";
        }
        ?>
    </div>
</body>
</html>