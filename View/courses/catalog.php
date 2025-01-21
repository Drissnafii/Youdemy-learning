<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #6b46c1 0%, #4f46e5 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white bg-opacity-90 backdrop-filter backdrop-blur-lg shadow-sm z-50">
    <div class="max-w-7xl mx-auto pxb-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-purple-700 font-poppins">Youdemy</a>
        <div class="hidden md:flex items-center space-x-8">
            <a href="#CoursesF" class="text-gray-700 hover:text-purple-700 transition-colors">Courses</a>
            <a href="#mycrss" class="text-gray-700 hover:text-purple-700 transition-colors">My Courses</a>
            <a href="./../courses/catalog.php" class="bg-purple-700 text-white px-6 py-2 rounded-full font-medium hover:bg-purple-800 transition-colors">Logout</a>
        </div>
        <!-- Mobile Menu Button (Hamburger Icon) -->
        <button class="md:hidden p-2 focus:outline-none">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="hero-gradient text-white pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl font-bold mb-4 font-poppins">Welcome Back to Youdemy, Username!</h1>
                <p class="text-lg opacity-90 mb-8">Continue exploring new courses or access your current ones to progress in your studies.</p>
                <div class="flex space-x-4">
                    <a href="#CoursesF" class="bg-white text-purple-700 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">Explore Courses</a>
                    <a href="#mycrss" class="bg-white bg-opacity-10 text-white px-8 py-3 rounded-full font-medium hover:bg-opacity-20 transition-colors">My Courses</a>
                </div>
            </div>
            <!-- User Image styling  -->
            <div class="ml-auto group relative w-64 h-60 overflow-hidden rounded-lg shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 animate-pulse duration-5000"></div>
                <img src="./../../public/assets/images/PngItem_800194 (1).png" alt="Learning Illustration" class="absolute inset-0 w-full h-full object-cover rounded-lg">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 transition duration-300 ease-in-out group-hover:opacity-100 bg-black/20">
                    <p class="text-white text-xl font-bold"></p>
                </div>
            </div>

</div>
    </section>

    <!-- Featured Courses -->
    <section id="CoursesF" class="py-16 bg-gray-50 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 font-poppins">Featured Courses</h2>
                <p class="text-gray-700 max-w-2xl mx-auto">Check out the most popular courses or find your next learning adventure.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Course Card -->
                <div class="feature-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="relative overflow-hidden">
                        <img src="/api/placeholder/400/225" alt="Course Image" class="w-full h-auto">
                        <div class="absolute inset-0 bg-purple-700 bg-opacity-70 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                            <span class="text-sm font-medium text-white">View More</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 font-poppins">Web Development</h3>
                        <p class="text-gray-700 mb-4">Learn to build modern web applications with the latest technologies.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-700">By John Doe</span>
                            <div>
                                <span class="text-yellow-600">★</span>
                                <span class="text-gray-700">4.8 (1,234)</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-purple-700 font-bold">$99.99</span>
                            <a href="#" class="text-purple-700 font-medium hover:text-purple-800 transition-colors">View Course →</a>
                        </div>
                    </div>
                </div>
                <!-- Additional course cards with the same structure -->
            </div>
        </div>
    </section>

    <!-- My Courses Section -->
    <section id="mycrss" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 font-poppins">My Courses</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Enrolled Course Card -->
                <div class="feature-card bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 font-poppins">Advanced Web Development</h3>
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700">Progress</span>
                            <span class="text-purple-700 font-medium">60%</span>
                        </div>
                        <div class="bg-gray-100 h-2 rounded-full">
                            <div class="bg-purple-700 h-2 rounded-full" style="width: 60%;"></div>
                        </div>
                    </div>
                    <a href="#" class="inline-block bg-purple-700 text-white px-6 py-3 rounded-full font-medium hover:bg-purple-800 transition-colors">Continue Learning</a>
                </div>
                <!-- Additional enrolled course cards -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <div class="text-gray-400 mb-4">© 2025 Youdemy. All rights reserved.</div>
            <div>
                <a href="#" class="text-gray-400 hover:text-gray-300 transition-colors mx-4">Terms of Service</a>
                <a href="#" class="text-gray-400 hover:text-gray-300 transition-colors mx-4">Privacy Policy</a>
            </div>
        </div>
    </footer>
</body>
</html>