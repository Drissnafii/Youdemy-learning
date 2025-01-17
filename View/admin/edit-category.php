<?php
include __DIR__ . '/../../src/Models/Admin.php';
$cate = null;
$Admin = new Admin();
if (isset($_GET['id'])) {
    $cate = $Admin->readOneCatego($_GET['id']);
}
if (isset($_POST['addCatego'])) {
    $Admin->upgateCatego($_POST['Name'], $_POST['description'],$_POST['user_id'] );
    header('location: create-category.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
     <style>
        body { font-family: sans-serif; margin: 20px; }
        h2 { margin-bottom: 20px; }
        div { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea { padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 100%; box-sizing: border-box;}
        button { padding: 10px 15px; background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #e0e0e0; }
    </style>
</head>
<body>
    <h2>Ediiiiit Category--------------</h2>
    <form method="post">
        <div>
            <input type="hidden" name="user_id" value="<?= $_GET['id']?>">
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="Name" value="<?= $cate->Name ?>" required>
        </div>
         <div>
            <label for="description">Category Description:</label>
            <textarea  id="description" name="description" rows="4" required><?php echo $cate->Description ?></textarea>
        </div>
        <button type="submit" name="addCatego" action = "">Update Category</button>
    <p><a href="create-category.php">Cancel </a>?</p>
    </form>
</body>
</html>