<?php
include __DIR__ . '/../../src/Models/Admin.php';
$cate = null;
$Admin = new Admin();
if (isset($_GET['id'])) {
    $cate = $Admin->readOneCatego($_GET['id']);
}
if (isset($_POST['addCatego'])) {
    $Admin->upgateCatego($_POST['Name'], $_POST['description'], $_POST['user_id']);
    header('location: create-category.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
      <style>
          body {
            font-family: 'Outfit', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="font-outfit bg-gray-50 p-4">
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Edit Category</h2>
    <form method="post" class="max-w-lg bg-white rounded-lg shadow-md p-6">
        <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name:</label>
            <input type="text" id="name" name="Name" value="<?= $cate->Name ?>" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Category Description:</label>
            <textarea id="description" name="description" rows="4" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"><?= $cate->Description ?></textarea>
        </div>
        <button type="submit" name="addCatego"
            class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Update
            Category</button>
             <p class="mt-4"><a href="create-category.php" class="text-green-600 hover:text-green-700">Cancel</a></p>
    </form>
</body>

</html>