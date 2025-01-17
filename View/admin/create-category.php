<?php
require __DIR__ . '/../../src/Models/Admin.php';
$Admin = new Admin();
if (isset($_POST['addCatego'])) {
    $Admin->sendCatego($_POST['Name'], $_POST['description']);
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
    <h2>Create New Category</h2>
    <form method="post">
        <div>
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="Name" required>
        </div>
         <div>
            <label for="description">Category Description:</label>
            <textarea  id="description" name="description" rows="4" required></textarea>
        </div>
        <button type="submit" name="addCatego">Add Category</button>
    <p>You Wanna Creat A <a href="create-tag.php">Tag </a>?</p>
    </form>
    <?php
        echo "<div>";
        echo "<table class= w3-table-all w3-centered id='myTable'>";
        echo "<tr>
                <th>Name</th><br>   
                <th>Description</th><br>
            </tr>";
            $Categories = $Admin->readCatego();
            foreach ($Categories as $Category) {
                // echo "<pre>";
                // var_dump($contact[4]); die();
                // echo "</pre>";


                # code...
                echo "<tr>
                <td>$Category->Name</td>
                <td>$Category->Description</td>  
                <td>
                    <form method='post' action='delete-category.php?id=$Category->CategoryID'>
                        <input type='submit' value='delete' name='deleteCategoX'>
                    </form>
                    
                    <form method='post' action='edit-category.php?id=$Category->CategoryID'>
                        <input type='submit' value='edit' name='editCategoX'>
                    </form>
                </td>
            </tr>";
            }

        echo "</table>";
        echo "</div>";
    ?>
</body>
</html>