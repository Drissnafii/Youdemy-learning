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
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Create New Category</h2>
    <form method="post" class="max-w-lg bg-white rounded-lg shadow-md p-6">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name:</label>
            <input type="text" id="name" name="Name" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Category Description:</label>
            <textarea id="description" name="description" rows="4" required
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
        </div>
        <button type="submit" name="addCatego"
            class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Add
            Category</button>
        <p class="mt-4">You Wanna Creat A <a href="create-tag.php" class="text-green-600 hover:text-green-700">Tag
            </a>?</p>
    </form>
    <div class="mt-8">
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Name</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Description</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Categories = $Admin->readCatego();
                foreach ($Categories as $Category) {
                    echo "<tr>
                    <td class='px-6 py-4 whitespace-nowrap'>$Category->Name</td>
                    <td class='px-6 py-4'>$Category->Description</td>
                    <td class='px-6 py-4 whitespace-nowrap'>
                        <form method='post' action='delete-category.php?id=$Category->CategoryID' class='inline'>
                            <input type='submit' value='delete' name='deleteCategoX' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded cursor-pointer'>
                        </form>
                        
                        <form method='post' action='edit-category.php?id=$Category->CategoryID' class='inline'>
                            <input type='submit' value='edit' name='editCategoX' class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer'>
                        </form>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>