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
        h1, h2, h3, h4, h5, h6 { 
            font-family: 'Poppins', sans-serif; 
        }
        .categories-table-container {
            max-height: calc(100vh - 180px);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #22c55e #e5e7eb;
        }
        .categories-table-container::-webkit-scrollbar {
            width: 8px;
        }
        .categories-table-container::-webkit-scrollbar-track {
            background: #e5e7eb;
            border-radius: 4px;
        }
        .categories-table-container::-webkit-scrollbar-thumb {
            background-color: #22c55e;
            border-radius: 4px;
        }
    </style>
</head>

<body class="font-outfit bg-gray-50">
    <!-- Admin Header -->
    <nav class="fixed w-full bg-white bg-opacity-90 backdrop-filter backdrop-blur-lg shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-green-700 font-poppins">Admin Dashboard</a>
            <div class="hidden md:flex items-center space-x-8">
                <a href="create-category.php" class="text-gray-700 hover:text-green-700 transition-colors">Categories</a>
                <a href="create-tag.php" class="text-gray-700 hover:text-green-700 transition-colors">Tags</a>
                <a href="../../public/index.php" class="bg-green-700 text-white px-6 py-2 rounded-full font-medium hover:bg-green-800 transition-colors">Logout</a>
            </div>
            <button class="md:hidden p-2 focus:outline-none">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Create Category Form -->
            <div class="w-full">
                <h2 class="text-3xl font-poppins font-bold text-gray-900 mb-6">Create New Category</h2>
                <form method="post" class="bg-white rounded-xl shadow-md p-8 mb-8">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name:</label>
                        <input type="text" id="name" name="Name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Category Description:</label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"></textarea>
                    </div>
                    <button type="submit" name="addCatego"
                        class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 w-full">
                        Add Category
                    </button>
                    <p class="mt-4 text-sm text-gray-600 text-center">
                        You Wanna Create A <a href="create-tag.php" class="text-green-600 hover:text-green-700 transition duration-300">Tag</a>?
                    </p>
                </form>
            </div>

            <!-- Categories Table -->
            <div>
                <h2 class="text-2xl font-poppins font-bold text-gray-900 mb-6">List of Categories</h2>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="categories-table-container">
                        <table class="w-full">
                            <thead class="bg-gray-100 sticky top-0">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Description</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php
                                $Categories = $Admin->readCatego();
                                foreach ($Categories as $Category) {
                                    echo "<tr class='hover:bg-gray-50 transition duration-300'>";
                                    echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($Category->Name) . "</td>";
                                    echo "<td class='px-6 py-4'>" . htmlspecialchars($Category->Description) . "</td>";
                                    echo "<td class='px-6 py-4 whitespace-nowrap flex gap-2'>";
                                    echo "<form method='post' action='delete-category.php?id=$Category->CategoryID' class='inline' onsubmit='return confirmDelete()'>";
                                    echo "<input type='submit' value='Delete' name='deleteCategoX' class='bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300'>";
                                    echo "</form>";
                                    echo "<form method='post' action='edit-category.php?id=$Category->CategoryID' class='inline'>";
                                    echo "<input type='submit' value='Edit' name='editCategoX' class='bg-green-500 hover:bg-green-700 text-white px-3 py-1 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300'>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Script for Deletion -->
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this category?");
        }
    </script>
</body>

</html>