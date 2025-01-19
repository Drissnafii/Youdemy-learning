<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body class="font-outfit bg-gradient-to-br from-[#F5EFFF] to-white min-h-screen">
    <div class="container mx-auto mt-8 p-4 max-w-2xl">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Add New Product</h1>
            <form id="productForm" method="post" action="/admin/products/create" class="space-y-6">
                <div class="space-y-2">
                    <label for="name" class="block text-gray-700 text-sm font-semibold">Product Name</label>
                    <input
                        type="text"
                        id="name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#A294F9] focus:border-transparent transition-all placeholder-gray-500"
                        placeholder="Enter product name"
                        required
                        minlength="3"
                        maxlength="100"
                        autocomplete="name"
                        name="name"
                    >
                    <p class="text-sm text-gray-500 hidden mt-1" id="nameHelp">Product name must be between 3 and 100 characters</p>
                </div>
                <div class="space-y-2">
                    <label for="description" class="block text-gray-700 text-sm font-semibold">Description</label>
                    <textarea
                        id="description"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#A294F9] focus:border-transparent transition-all min-h-[120px] placeholder-gray-500"
                        placeholder="Enter product description"
                        name="description"
                        maxlength="500"
                    ></textarea>
                    <p class="text-sm text-gray-500 mt-1" id="charCount">0/500 characters</p>
                </div>
                <div class="space-y-2">
                    <label for="price" class="block text-gray-700 text-sm font-semibold">Price</label>
                    <div class="relative">
                         <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
                        <input
                            type="number"
                            id="price"
                            class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#A294F9] focus:border-transparent transition-all placeholder-gray-500"
                            placeholder="0.00"
                            required
                            step="0.01"
                            min="0"
                            name="price"
                        >
                    </div>
                </div>
               <div class="space-y-2">
                    <label for="imageUrl" class="block text-gray-700 text-sm font-semibold">Image URL</label>
                    <input
                        type="url"
                        id="imageUrl"
                        name="imageUrl"
                       class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#A294F9] focus:border-transparent transition-all placeholder-gray-500"
                        placeholder="Enter image URL"
                        required
                    >
                    <div id="previewContainer" class="hidden mt-4">
                        <img id="imagePreview" class="mx-auto max-h-48 rounded-lg" src="" alt="Preview">
                    </div>
                </div>
                <div class="flex justify-center">
                   <button type="submit" id="submitBtn" class="
                        bg-[#A294F9]
                        text-white
                        px-6
                        py-3
                        rounded-lg
                        transition-all
                        duration-300
                        hover:bg-[#8C7DF9]
                        focus:outline-none
                        focus:ring-2
                        focus:ring-[#A294F9]
                        focus:ring-opacity-50
                        disabled:opacity-50
                       disabled:cursor-not-allowed
                         flex
                       items-center
                       gap-2
                    ">
                        <span>Add Product</span>
                          <div id="loadingSpinner" class="hidden">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                          </div>
                   </button>
               </div>
            </form>
        </div>
    </div>
     <script>
        // Character counter for description
        const description = document.getElementById('description');
        const charCount = document.getElementById('charCount');
        description.addEventListener('input', function() {
            const remaining = this.value.length;
            charCount.textContent = `${remaining}/500 characters`;
        });
        // Image preview functionality
        const imageUrl = document.getElementById('imageUrl');
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');
        imageUrl.addEventListener('input', function() {
            if (this.value) {
                imagePreview.src = this.value;
                previewContainer.classList.remove('hidden');
                // Handle image load error
                imagePreview.onerror = function() {
                    previewContainer.classList.add('hidden');
                }
            } else {
                previewContainer.classList.add('hidden');
            }
        });
        // Form Validation
      const submitBtn = document.getElementById("submitBtn");
       const name = document.getElementById("name");
       const nameHelp = document.getElementById("nameHelp");
       const loadingSpinner = document.getElementById("loadingSpinner");
     document.getElementById('productForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default submission
        if (name.value.length < 3 || name.value.length > 100) {
                nameHelp.classList.remove('hidden');
            return false; // Stop submission
          } else{
           nameHelp.classList.add('hidden');
          }
        loadingSpinner.classList.remove('hidden')
         submitBtn.setAttribute('disabled', 'true');
          setTimeout(() => {
          this.submit();
          }, 1000);
});
    </script>
</body>
</html>