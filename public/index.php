<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Online Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #6b46c1 0%, #4f46e5 100%); /* Adjusted gradient colors */
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        body {
            font-family: 'Outfit', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-[#fdf7f4]">

    <!-- Navigation -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-sm z-50 shadow-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-[#6b46c1] font-poppins">Youdemy</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/courses" class="text-gray-600 hover:text-gray-900 transition-colors">Courses</a>
                    <a href="../View/auth/login.php" class="text-gray-600 hover:text-gray-900 transition-colors">Login</a>
                    <a href="View/auth/register.php" class="px-6 py-2 bg-[#6b46c1] text-white rounded-full hover:bg-[#4f46e5] transition-colors font-medium">
                        Register
                    </a>
                </div>
                <button class="md:hidden text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <h1 class="text-5xl font-bold leading-tight mb-6 font-poppins">
                        Welcome to Youdemy! Unlock Your Potential with Online Learning
                    </h1>
                    <p class="text-lg mb-8 text-white/90">
                        Explore a wide range of courses taught by expert instructors. Start your learning journey today.
                    </p>
                    <div class="flex gap-4">
                        <a href="/courses" class="px-8 py-3 bg-white text-[#6b46c1] rounded-full hover:bg-gray-100 transition-colors font-semibold">
                            Explore Courses
                        </a>
                        <a href="/register" class="px-8 py-3 bg-white/10 text-white rounded-full hover:bg-white/20 transition-colors font-medium">
                            Sign Up
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img src="./assets/images/udemyLogo.png" alt="Online Learning" class="rounded-lg shadow-2xl">
                    <!-- You can add the rating overlay back if you want, but it might be better to just have the hero image -->
                </div>
            </div>
        </div>
    </section>

<!-- Featured Courses -->
<section id="courses" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-4 font-poppins">Featured Courses</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Discover our most popular courses tailored to your interests and career goals.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Course Card -->
            <div class="feature-card bg-white p-6 rounded-xl shadow-sm transition-all duration-300 group">
                <div class="relative overflow-hidden rounded-lg mb-4">
                    <img src="https://www.optimalvirtualemployee.com/wp-content/uploads/2022/12/Web-Developer-skill-768x436.jpg" alt="Web Development Course Image" class="w-full h-auto transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 right-0 bg-[#6b46c1]/70 text-white p-2 text-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-xs font-medium">View More</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2 font-poppins">Web Development</h3>
                <p class="text-gray-600 mb-4">Learn to build modern web applications with HTML, CSS, JavaScript, and more.</p>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-700">By John Doe</span>
                    <span class="text-gray-700">
                        <span class="inline-block align-middle">
                            <svg class="w-4 h-4 inline-block mr-1" viewBox="0 0 24 24" fill="#FFD700">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </span>
                        4.8 (1234 reviews)
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[#6b46c1] font-bold">$99</span>
                    <a href="#" class="text-[#6b46c1] hover:text-[#4f46e5] transition-colors font-medium">
                        View Course <span class="ml-1">→</span>
                    </a>
                </div>
            </div>
            <!-- Repeat for other courses -->

            <!-- Data Science -->
            <div class="feature-card bg-white p-6 rounded-xl shadow-sm transition-all duration-300 group">
                <div class="relative overflow-hidden rounded-lg mb-4">
                    <img src="https://dataexpertise.in/wp-content/uploads/2023/10/Data-Science-Must-have-Skills-e1697006962750-768x540.jpg" alt="Data Science Course Image" class="w-full h-auto transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 right-0 bg-[#6b46c1]/70 text-white p-2 text-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-xs font-medium">View More</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2 font-poppins">Data Science</h3>
                <p class="text-gray-600 mb-4">Master data analysis, machine learning, and visualization techniques.</p>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-700">By Jane Smith</span>
                    <span class="text-gray-700">
                        <span class="inline-block align-middle">
                            <svg class="w-4 h-4 inline-block mr-1" viewBox="0 0 24 24" fill="#FFD700">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </span>
                        4.9 (5678 reviews)
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[#6b46c1] font-bold">$149</span>
                    <a href="#" class="text-[#6b46c1] hover:text-[#4f46e5] transition-colors font-medium">
                        View Course <span class="ml-1">→</span>
                    </a>
                </div>
            </div>

            <!-- Digital Marketing -->
            <div class="feature-card bg-white p-6 rounded-xl shadow-sm transition-all duration-300 group">
                <div class="relative overflow-hidden rounded-lg mb-4">
                    <img src="https://www.optimalvirtualemployee.com/wp-content/uploads/2022/12/Web-Developer-skill-768x436.jpg" alt="Digital Marketing Course Image" class="w-full h-auto transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute bottom-0 left-0 right-0 bg-[#6b46c1]/70 text-white p-2 text-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-xs font-medium">View More</span>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2 font-poppins">Digital Marketing</h3>
                <p class="text-gray-600 mb-4">Grow your business with SEO, social media, and content marketing strategies.</p>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-700">By Alex Johnson</span>
                    <span class="text-gray-700">
                        <span class="inline-block align-middle">
                            <svg class="w-4 h-4 inline-block mr-1" viewBox="0 0 24 24" fill="#FFD700">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </span>
                        4.7 (9012 reviews)
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[#6b46c1] font-bold">$79</span>
                    <a href="#" class="text-[#6b46c1] hover:text-[#4f46e5] transition-colors font-medium">
                        View Course <span class="ml-1">→</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-center mt-12">
            <a href="/courses" class="inline-block px-8 py-3 bg-[#6b46c1] text-white rounded-full hover:bg-[#4f46e5] transition-colors font-semibold">
                View All Courses
            </a>
        </div>
    </div>
</section>

    <!-- Benefits Section -->
    <section id="features" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 font-poppins">Why Choose Youdemy?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    We provide the best learning experience with interactive courses and expert instructors.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-6 rounded-xl shadow-sm transition-all duration-300">
                    <div class="w-12 h-12 bg-[#6b46c1]/10 rounded-lg flex items-center justify-center mb-4">
                        <!-- You can replace these with Font Awesome icons if you include the library -->
                        <svg class="w-6 h-6 text-[#6b46c1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 font-poppins">Expert Instructors</h3>
                    <p class="text-gray-600">Learn from industry experts with real-world experience.</p>
                </div>
                <div class="feature-card bg-white p-6 rounded-xl shadow-sm transition-all duration-300">
                    <div class="w-12 h-12 bg-[#6b46c1]/10 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#6b46c1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 font-poppins">Wide Range of Courses</h3>
                    <p class="text-gray-600">Choose from a diverse catalog of courses across various domains.</p>
                </div>
                <div class="feature-card bg-white p-6 rounded-xl shadow-sm transition-all duration-300">
                    <div class="w-12 h-12 bg-[#6b46c1]/10 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#6b46c1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 font-poppins">Flexible Learning</h3>
                    <p class="text-gray-600">Learn at your own pace with our flexible course schedules.</p>
                </div>
                <!-- Additional benefit points can be added here -->
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="bg-[#6b46c1] rounded-2xl p-12 text-center">
                <h2 class="text-3xl font-bold text-white mb-4 font-poppins">Ready to Start Learning?</h2>
                <p class="text-white/90 mb-8 max-w-2xl mx-auto">
                    Join our community of learners and educators today. Start your journey with Youdemy!
                </p>
                <a href="../View/auth/register.php" class="inline-block px-8 py-3 bg-white text-[#6b46c1] rounded-full hover:bg-gray-100 transition-colors font-semibold">
                    Sign Up Now
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="text-center mt-8 text-gray-400">
                © 2025 Youdemy. All rights reserved.
            </div>
            <div class="text-center mt-4 text-gray-400">
                <a href="/terms" class="hover:text-white transition-colors mx-2">Terms of Service</a>
                <a href="/privacy" class="hover:text-white transition-colors mx-2">Privacy Policy</a>
            </div>
        </div>
    </footer>

</body>
</html>