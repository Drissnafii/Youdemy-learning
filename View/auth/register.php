<?php
    require __DIR__ . '/../../src/Models/User.php';
    require __DIR__ . '/../../includes/header.php';
    if (isset($_SESSION['error_message'])) {
        echo "<div class='error-message'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
    if (isset($_POST['register'])) {
        $Driss = new User();
        $Driss->register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role']);
        echo "<div class='success-message'>Inserted successfully!</div>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Account</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="./../../public/assets/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="w-full max-w-md mx-auto">
        <div class="bg-[#F2F0E9] rounded-xl shadow-md p-8 border border-gray-200 max-w-xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-[#CDC1FF] rounded-full inline-flex items-center justify-center mb-4">
                  <i class="fas fa-user-plus text-7xl"></i>
                </div>
                <h1 class="text-gray-800 text-xl mb-2">Create Account</h1>
                <p class="text-gray-600 text-sm">Start your journey with us.</p>
            </div>

            <!-- Form -->
            <form method="POST">
              <!-- Username Field -->
                <div class="relative mb-6">
                    <input
                    name="username"
                        type="text"
                        id="username"
                        class="form-control"
                        placeholder=" "
                        required
                        autocomplete="username"
                    >
                     <label for="username" class="floating-label">Username</label>
                </div>
                <!-- Email Field -->
                <div class="relative mb-6">
                  <input
                  name="email"
                    type="email"
                    id="email"
                    class="form-control"
                    placeholder=" "
                    required
                    autocomplete="email"
                  >
                  <label for="email" class="floating-label">Email address</label>
                </div>


                <!-- Password Field -->
                <div class="relative mb-6">
                    <input
                    name="password"
                      type="password"
                        id="password"
                        class="form-control"
                        placeholder=" "
                        required
                        autocomplete="new-password"
                    >
                    <label for="password" class="floating-label">Password</label>
                    <button
                        type="button"
                        id="password-toggle"
                        class="password-toggle"
                        aria-label="Toggle password visibility"
                     >
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>

        <!-- Role Selection -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-3 text-center">Select Your Role</label>
            <div class="grid grid-cols-2 gap-4">
                <label class="role-option">
                    <input 
                        type="radio" 
                        name="role" 
                        value="student" 
                        class="hidden peer" 
                        required
                    >
                    <div class="
                        p-4 
                        border 
                        border-gray-200 
                        rounded-lg 
                        cursor-pointer 
                        transition 
                        duration-300 
                        hover:border-[#A294F9] 
                        peer-checked:border-[#A294F9] 
                        peer-checked:bg-[#F5EFFF] 
                        peer-checked:shadow-md
                    ">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-graduation-cap text-4xl mb-2 text-gray-500 peer-checked:text-[#A294F9]"></i>
                            <span class="text-gray-700 font-semibold peer-checked:text-[#8C7DF9]">Student</span>
                            <p class="text-xs text-gray-500 text-center mt-2">
                                Access learning resources and track your progress
                            </p>
                        </div>
                    </div>
                </label>

                <label class="role-option">
                    <input 
                        type="radio" 
                        name="role" 
                        value="teacher" 
                        class="hidden peer" 
                        required
                    >
                    <div class="
                        p-4 
                        border 
                        border-gray-200 
                        rounded-lg 
                        cursor-pointer 
                        transition 
                        duration-300 
                        hover:border-[#A294F9] 
                        peer-checked:border-[#A294F9] 
                        peer-checked:bg-[#F5EFFF] 
                        peer-checked:shadow-md
                    ">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-chalkboard-teacher text-4xl mb-2 text-gray-500 peer-checked:text-[#A294F9]"></i>
                            <span class="text-gray-700 font-semibold peer-checked:text-[#8C7DF9]">Teacher</span>
                            <p class="text-xs text-gray-500 text-center mt-2">
                                Create and manage courses, track student progress
                            </p>
                        </div>
                    </div>
                </label>
            </div>
        </div>



                <!-- Submit Button -->
                  <button type="submit" name="register" class="
    w-full 
    py-3 
    relative
    overflow-hidden
    bg-[#A294F9]
    text-[#F5EFFF] 
    border 
    border-transparent
    rounded-full
    font-semibold 
    transition-all 
    duration-300 
    flex 
    items-center 
    justify-center 
    gap-2 
    active:bg-[#8C7DF9]
    disabled:bg-[#E5D9F2]
    disabled:text-[#A294F9]
    hover:shadow-[#CDC1FF]/40
    active:scale-84
    before:absolute
    before:inset-0
    before:bg-[#8C7DF9]
    before:transition-transform
    before:duration-500
    before:transform 
    before:scale-x-0 
    before:origin-center
    hover:before:scale-x-100
    aria-disabled:true
">
    <span class="relative z-10">Create Account</span>
     <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 relative z-10" viewBox="0 0 20 20" fill="currentColor">
       <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
</button>
            </form>

            <!-- Log In Link -->
            <div class="text-center mt-6 text-sm text-gray-600">
                <p>
                    Already have an account?
                    <a href="login.php" class="text-[#A294F9] no-underline font-medium transition-colors duration-200 hover:text-[#8C7DF9]">Login here</a>
                </p>
            </div>
        </div>
    </div>

       <script src="https://cdn.tailwindcss.com"></script>
       <script>
       module.exports = {
         content: ["./src/**/*.{html,js}"],
         theme: {  
           extend: {
              fontFamily:{
               'outfit' : ['Outfit', 'sans-serif'],
                 'poppins': ['Poppins', 'sans-serif'],
               }
           },
         },
         plugins: [],
       }
       </script>
</body>
<script src="./../../public/assets/main.js"></script>
</html>
  <!-- require __DIR__ . '/View/includes/footer.php';  -->