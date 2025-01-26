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
        body { font-family: 'Outfit', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', sans-serif; }
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
                <a href="../auth/logout.php" class="bg-green-700 text-white px-6 py-2 rounded-full font-medium hover:bg-green-800 transition-colors">Logout</a>
            </div>
            <!-- Mobile Menu Button -->
            <button class="md:hidden p-2 focus:outline-none">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        <!-- Centered "Edit Category" Form -->
        <div class="flex justify-center items-center">
            <div class="w-full max-w-lg">
                <h2 class="text-3xl font-poppins font-bold text-gray-900 mb-6 text-center">Edit Category</h2>
                <form method="post" class="bg-white rounded-xl shadow-md p-8">
                    <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name:</label>
                        <input type="text" id="name" name="Name" value="<?= $cate->Name ?>" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Category Description:</label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"><?= $cate->Description ?></textarea>
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="submit" name="addCatego"
                            class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 w-full">
                            Update Category
                        </button>
                        <a href="create-category.php" class="text-gray-600 hover:text-gray-800 transition duration-300 text-center">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>