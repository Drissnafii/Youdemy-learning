<?php
require __DIR__ . '/../../src/Models/Course.php';
try {
    $course = new Course();
    $tags = $course->getAllTags();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Page - Youdemy</title>
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
        .hero-gradient {
            background: linear-gradient(135deg, #6b46c1 0%, #4f46e5 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body class="font-outfit bg-gray-50 min-h-screen">
    <!-- Navigation Bar -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-sm z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <a href="#" class="text-2xl font-bold text-purple-700 font-poppins">Youdemy</a>
                <div class="hidden md:flex items-center space-x-8">
                    <span class="text-gray-700">Welcome, Teacher Name!</span>
                    <a href="#my-courses" class="text-gray-700 hover:text-purple-700 transition-colors">My Courses</a>
                    <a href="#create-course" class="text-gray-700 hover:text-purple-700 transition-colors">Create Course</a>
                    <a href="#statistics" class="text-gray-700 hover:text-purple-700 transition-colors">Statistics</a>
                    <a href="#" class="text-red-600 hover:text-red-700">Logout</a>
                </div>
                <button class="md:hidden text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient text-white pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl font-bold mb-4 font-poppins">Welcome Back, Teacher Name!</h1>
                <p class="text-lg opacity-90 mb-8">Manage your courses, track student progress, and create new content to inspire learners.</p>
                <div class="flex space-x-4">
                    <a href="#my-courses" class="bg-white text-purple-700 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">My Courses</a>
                    <a href="#create-course" class="bg-white bg-opacity-10 text-white px-8 py-3 rounded-full font-medium hover:bg-opacity-20 transition-colors">Create Course</a>
                </div>
            </div>
            <div>
                <img src="./../../public/assets/images/udemyLogo.png" alt="Teaching Illustration" class="w-full rounded-lg shadow-xl">
            </div>
        </div>
    </section>

    <!-- My Courses Section -->
    <section id="my-courses" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 font-poppins">My Courses</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Course Card -->
                <div class="feature-card bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Introduction to Web Development</h2>
                    <p class="text-gray-600 mb-4">Learn the basics of HTML, CSS, and JavaScript...</p>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        <span>125 students enrolled</span>
                    </div>
                    <div class="flex space-x-3">
                        <a href="#"
                            class="flex-1 bg-purple-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-purple-800 text-center">Edit</a>
                        <a href="#"
                            class="flex-1 bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 text-center">Delete</a>
                    </div>
                </div>
                <!-- Additional course cards -->
            </div>
        </div>
    </section>

    <!-- Create Course Section -->
    <section id="create-course" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 font-poppins">Create New Course</h2>
            <form class="space-y-6 bg-white shadow-md rounded-lg p-6" method="POST" action="create_course.php" enctype="multipart/form-data">
                <!-- Course Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Course Title</label>
                    <input type="text" name="course_title"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea rows="4" name="description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                </div>

                <!-- Content (Upload Files) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content (Upload Files)</label>
                    <input type="file" name="course_content" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select name="category"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile Development">Mobile Development</option>
                        <option value="Data Science">Data Science</option>
                    </select>
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                    <select multiple name="tags[]"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <?php if (!empty($tags)): ?>
                            <?php foreach ($tags as $tag): ?>
                                <option value="<?php echo htmlspecialchars($tag['TagID']); ?>">
                                    <?php echo htmlspecialchars($tag['Name']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option disabled>No tags available</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-purple-700 text-white px-6 py-3 rounded-md font-medium hover:bg-purple-800">
                    Create Course
                </button>
            </form>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="statistics" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 font-poppins">Statistics</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Courses</h3>
                    <p class="text-3xl font-bold text-purple-700">12</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Students</h3>
                    <p class="text-3xl font-bold text-purple-700">1,250</p>
                </div>
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