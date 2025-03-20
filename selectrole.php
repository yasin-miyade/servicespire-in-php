<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../assets/css/style.css" rel="stylesheet">

</head>
<body class="bg-gradient-to-br from-blue-100 to-gray-200 flex items-center justify-center min-h-screen">

    <!-- Back Button -->
    <div class="absolute top-20 left-32">
        <a href="index.php" class="flex items-center text-gray-600 hover:text-gray-900 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
    </div>


    <!-- Card Container -->
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md text-center">
        <h2 class="text-2xl font-extrabold text-gray-800">Select Your Role</h2>
        <p class="text-gray-500 mt-2 mb-6">Choose how you want to proceed</p>

        <!-- Role Buttons -->
        <div class="space-y-4">
            <a href="user/login.php" class="block w-full bg-blue-600 text-white py-3 rounded-lg font-semibold text-lg shadow-md hover:bg-blue-700 transition transform hover:scale-105">
                Continue as User
            </a>
            <a href="helper/login.php" class="block w-full bg-green-600 text-white py-3 rounded-lg font-semibold text-lg shadow-md hover:bg-green-700 transition transform hover:scale-105">
                Continue as Helper
            </a>
        </div>
    </div>

</body>
</html>