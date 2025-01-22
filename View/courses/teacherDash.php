<?php
session_start();
// if the user exist in the SESSION ==> You have the access , 
if (isset($_SESSION['userId'])) {
}else{
    $loginPage = "http://" . 'localhost' . "/Youdemy-learning/View/auth/login.php";
    header("location: $loginPage");
}
// else U dont have the access !
require __DIR__ . '/../../src/Models/Course.php';

try {
    $course = new Course();
    $tags = $course->getAllTags();
    $categories = $course->getAllCategories();

    // Fetch created courses 
    $teacherID = $_SESSION['userId'];
    $courses = $course->getCourses($teacherID);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['course_title'];
    $description = $_POST['description'];
    $categoryID = $_POST['category'];
    $teacherID = $_SESSION['userId'];
    $videoLink = $_POST['video_link'];

    try {
        $course->createCourse($title, $description, $categoryID, $teacherID, $videoLink);
        return "Course created successfully!";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    if (isset($_POST['course_id'])) {
        try {
            $courseID = $_POST['course_id'];
            $teacherID = $_SESSION['userId'];
            
            if ($course->deleteCourse($courseID, $teacherID)) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?message=deleted");
                exit();
            } else {
                throw new Exception("Unable to delete course");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
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
                    <a href="#my-courses" class="text-gray-700 hover:text-purple-700 transition-colors">My Courses</a>
                    <a href="#create-course" class="text-gray-700 hover:text-purple-700 transition-colors">Create Course</a>
                    <a href="#statistics" class="text-gray-700 hover:text-purple-700 transition-colors">Statistics</a>

                    <a href="./../auth/login.php" class="text-red-600 hover:text-red-700">Logout</a>

                </div>
                <button class="md:hidden text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>


    <!-- delete message susses  -->
    <?php if (isset($_GET['message'])): ?>
    <!-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24"> -->
        <?php if ($_GET['message'] === 'deleted'): ?>
            <!-- <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline"> Course has been deleted successfully.</span>
            </div> -->
        <?php endif; ?>
    </div>
<?php endif; ?>

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

            <div class="ml-auto relative w-64 h-80 overflow-hidden rounded-xl shadow-lg group">
                <img src="./../../public/assets/images/fahdd.jpg" alt="Teaching Illustration" class="absolute inset-0 w-full h-full object-cover transition duration-300 ease-in-out group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/50 transition duration-300 ease-in-out group-hover:bg-black/40"></div>
                <div class="absolute bottom-4 left-4 text-white transition duration-300 ease-in-out group-hover:bottom-6">
                    <h3 class="font-bold text-lg">Fahd Haourech</h3>
                    <p class="text-sm">Mathematics</p>
                </div>
            </div>

        </div>
    </section>



    <!-- My Courses       -->

    <section id="my-courses" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section with Stats -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 font-poppins">My Courses</h2>
                <p class="mt-2 text-gray-600">Manage and track your educational content</p>
            </div>
            <div class="mt-4 md:mt-0">
                <button class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create New Course
                </button>
            </div>
        </div>

        <!-- Course Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (!empty($courses)): ?>
                <?php foreach ($courses as $course): ?>
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                        <!-- Course Preview Image/Video -->
                        <div class="relative">
                            <?php if (!empty($course['VideoLink'])): ?>
                                <div class="aspect-w-16 aspect-h-9">
                                    <iframe 
                                        src="<?php echo htmlspecialchars($course['VideoLink']); ?>"
                                        class="w-full"
                                        title="Course Video" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen
                                    ></iframe>
                                </div>
                            <?php else: ?>
                                <div class="aspect-w-16 aspect-h-9 bg-gray-100 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                            
                        </div>

                        <!-- Course Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2">
                                <?php echo htmlspecialchars($course['Title']); ?>
                            </h3>
                            
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                <?php echo htmlspecialchars($course['Description']); ?>
                            </p>

                            <!-- Course Stats -->
                            <div class="flex items-center space-x-6 mb-6">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    <span><?php echo number_format($course['EnrolledStudents'] ?? 125); ?> students</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span><?php echo htmlspecialchars($course['Duration'] ?? '8 hours'); ?></span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3">
                                <button class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </button>
                            <form method="POST" action="" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($course['CourseID']); ?>">
                                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-red-600 text-red-600 rounded-md hover:bg-red-50 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                            </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Empty State -->
                <div class="col-span-full flex flex-col items-center justify-center py-12 bg-white rounded-xl">
                    <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No courses yet</h3>
                    <p class="text-gray-600 mb-4">Get started by creating your first course</p>
                    <button class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Course
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


                    <!-- FORM  -->


    <!-- Create Course Section -->
    <section id="create-course" class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-3xl mx-auto">
            <form class="space-y-6 bg-white shadow-md rounded-lg p-6" method="POST" action="" enctype="multipart/form-data">
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

                <!-- Content (YouTube Video Link) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">YouTube Video Link</label>
                    <input type="text" name="video_link" placeholder="Enter YouTube video URL (e.g., https://www.youtube.com/watch?v=abc123)"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select name="category"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category['CategoryID']); ?>">
                                    <?php echo htmlspecialchars($category['Name']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option disabled>No categories available</option>
                        <?php endif; ?>
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