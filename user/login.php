<?php
session_start();
require_once('../lib/function.php'); // Include database connection

$flag = 0; // Status flag for displaying messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new db_functions();
    $user = $db->get_user_by_email($email); // Fetch user from DB by email

    if ($user) {
        if ($password === $user['password']) { // Direct comparison (since passwords are stored in plain text)
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header('Location: index.php'); // Redirect after successful login
            exit();
        } else {
            $flag = 2; // Incorrect password
        }
    } else {
        $flag = 3; // User not found
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Back Button -->
    <div class="absolute top-20 left-32">
        <a href="../selectrole.php" class="flex items-center text-gray-600 hover:text-gray-900 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
    </div>

    <div class="mt-32 flex flex-col items-center w-full relative">
        <div class="mt-6 bg-white shadow-xl rounded-lg w-96 p-8 space-y-6">
            <div class="text-center">
                <?php if ($flag == 1) { ?>
                    <div class="text-green-700 bg-green-100 border border-green-500 px-4 py-2 rounded-md mb-4">
                        ✅ Login successful. Redirecting...
                    </div>
                <?php } elseif ($flag == 2) { ?>
                    <div class="text-red-700 bg-red-100 border border-red-500 px-4 py-2 rounded-md mb-4">
                        ❌ Invalid password.
                    </div>
                <?php } elseif ($flag == 3) { ?>
                    <div class="text-red-700 bg-red-100 border border-red-500 px-4 py-2 rounded-md mb-4">
                        ❌ User not found.
                    </div>
                <?php } ?>
                <h1 class="text-3xl font-semibold text-gray-800">Welcome Back!</h1>
                <p class="text-sm text-gray-600 mt-2">Please sign in to continue</p>
            </div>
            <form action="" method="POST" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email" class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password" class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Login
                    </button>
                </div>
            </form>
            <div class="text-center">
                <p class="text-sm text-gray-600">Don't have an account? <a href="signup.php" class="text-blue-600 hover:text-blue-800">Sign up</a></p>
            </div>
        </div>
    </div>
</body>
</html>