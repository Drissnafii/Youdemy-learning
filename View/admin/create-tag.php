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
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Create New Tag</h2>
    <form method="post" class="max-w-md bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Tag Name:</label>
            <input type="text" id="name" name="tag-input" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        <button type="submit" name="send-tag"
            class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Add
            Tag</button>
            <p class="mt-4">You Wanna Creat A <a href="create-category.php" class="text-green-600 hover:text-green-700">category </a>?</p>
    </form>
     <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">List of Tags</h2>
        <ul class="bg-white shadow-md rounded-lg p-4">
            <?php
            $Tags = $Admin->readTag();
            foreach ($Tags as $Tag) {
                echo "<li class='flex justify-between items-center border-b border-gray-200 py-2'>";
                echo "<span class='text-gray-700'>".$Tag['Name'] . "</span>";
                echo "<a href='delete-tag.php?id=". $Tag['TagID'].  "' class='bg-red-500 hover:bg-red-700 text-white px-2 py-1 rounded text-sm focus:outline-none focus:ring-2 focus:ring-red-500'>delete</a>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</body>

</html>