<?php
session_start();
require_once('../lib/function.php');

$db = new db_functions();
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error_message = "Both fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $password)) {
        $error_message = "Invalid password format.";
    } else {
        // Debugging: Print the email and password
        error_log("Attempting to login with email: $email and password: $password");

        $user = $db->login_user($email, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'] . " " . $user['last_name'];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid email or password.";
            // Debugging: Log the error
            error_log("Login failed for email: $email");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-inter flex items-center justify-center min-h-screen">

 <!-- Back Button -->
    <div class="absolute top-20 left-32">
        <a href="../selectrole.php" class="flex items-center text-gray-600 hover:text-gray-900 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
    </div>
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-sm">
        <h2 class="text-3xl font-bold text-center mb-4">Welcome Back!</h2>
        <p class="text-gray-600 text-center mb-6">Log in to your account to access exclusive content.</p>

        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($error_message); ?></span>
            </div> 
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <!-- <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> -->
            
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium mb-2">Email Address</label>
                <input id="email" name="email" type="email" placeholder="Enter your email"
                    value="<?php echo htmlspecialchars($email ?? ''); ?>"
                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition" 
                    required
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                    title="Enter a valid email address">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-medium mb-2">Password</label>
                <input id="password" name="password" type="password" placeholder="Enter your password"
                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                    required
                    minlength="6"
                    title="Password must be at least 6 characters">
            </div>
            <button type="submit"
                class="w-full p-3 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition">Log In</button>
        </form>

        <!-- Continue with Google Option -->
        <div class="flex items-center my-6">
            <hr class="w-full border-gray-200">
            <span class="px-3 text-gray-400">or</span>
            <hr class="w-full border-gray-200">
        </div>
        <a href="#" class="flex items-center justify-center w-full p-3 border rounded-lg hover:bg-gray-100 transition">
            <img src="https://img.icons8.com/fluent/24/000000/google-logo.png" alt="Google Logo" class="mr-2">
            <span class="font-medium text-gray-600">Continue with Google</span>
        </a>

        <!-- Register Now Option -->
        <div class="text-center mt-6">
            <p class="text-gray-600">
                Don't have an account? 
                <a href="signup.php" 
                   class="text-blue-500 hover:text-blue-700 font-semibold transition duration-300 ease-in-out border-b-2 border-transparent hover:border-blue-700">
                    Register Now
                </a>
            </p>
        </div>
    </div>
</body>
</html>