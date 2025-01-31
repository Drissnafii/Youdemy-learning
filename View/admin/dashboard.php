<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <a href="../../public/index.php" class="bg-green-700 text-white px-6 py-2 rounded-full font-medium hover:bg-green-800 transition-colors">Logout</a>
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
        <!-- Centered Dashboard Links -->
        <div class="flex justify-center items-center">
            <div class="w-full max-w-lg">
                <h1 class="text-3xl font-poppins font-bold text-gray-900 mb-8 text-center">Admin Dashboard</h1>
                <ul class="space-y-4">
                    <li>
                        <a href="create-tag.php" class="block bg-white rounded-xl shadow-md p-6 text-center text-gray-700 hover:bg-gray-50 transition duration-300">
                            Add New Tag
                        </a>
                    </li>
                    <li>
                        <a href="create-category.php" class="block bg-white rounded-xl shadow-md p-6 text-center text-gray-700 hover:bg-gray-50 transition duration-300">
                            Add New Category
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>