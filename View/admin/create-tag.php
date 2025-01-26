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
        <!-- Centered "Create New Tag" Form -->
        <div class="flex justify-center items-center">
            <div class="w-full max-w-lg">
                <h2 class="text-3xl font-poppins font-bold text-gray-900 mb-6 text-center">Create New Tag</h2>
                <form method="post" class="bg-white rounded-xl shadow-md p-8 mb-8">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Tag Name:</label>
                        <input type="text" id="name" name="tag-input" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    <button type="submit" name="send-tag"
                        class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 w-full">
                        Add Tag
                    </button>
                    <p class="mt-4 text-sm text-gray-600 text-center">
                        You Wanna Create A <a href="create-category.php" class="text-green-600 hover:text-green-700 transition duration-300">Category</a>?
                    </p>
                </form>
            </div>
        </div>

        <!-- List of Tags -->
        <div class="mt-10">
            <h2 class="text-2xl font-poppins font-bold text-gray-900 mb-6">List of Tags</h2>
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <ul class="divide-y divide-gray-200">
                    <?php
                    $Tags = $Admin->readTag();
                    foreach ($Tags as $Tag) {
                        echo "<li class='flex justify-between items-center px-6 py-4 hover:bg-gray-50 transition duration-300'>";
                        echo "<span class='text-gray-700'>" . htmlspecialchars($Tag['Name']) . "</span>";
                        echo "<a href='delete-tag.php?id=" . $Tag['TagID'] . "' class='bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300'>Delete</a>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>