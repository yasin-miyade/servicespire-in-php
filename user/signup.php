<?php
session_start(); // Start session
require_once('../lib/function.php'); // Include database functions

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Error: Passwords do not match.";
        header("Location: signup.php");
        exit();
    }

    // Handle file upload
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Create directory if not exists
    }

    $file_extension = pathinfo($_FILES["id_proof"]["name"], PATHINFO_EXTENSION);
    $new_filename = uniqid("id_proof_", true) . "." . $file_extension; // Generate unique filename
    $id_proof_path = $target_dir . $new_filename;

    if (!move_uploaded_file($_FILES["id_proof"]["tmp_name"], $id_proof_path)) {
        $_SESSION['error'] = "Error uploading file.";
        header("Location: signup.php");
        exit();
    }

    // Insert data into the database
    $db = new db_functions();
    if ($db->save_sign_up_data($first_name, $last_name, $dob, $gender, $mobile, $address, $email, $password, $id_proof_path)) {
        $_SESSION['success'] = "Registration successful! Please log in.";
    } else {
        $_SESSION['error'] = "Registration failed!";
    }
    header("Location: signup.php"); // Redirect to avoid resubmission
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function validatePassword() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            let errorText = document.getElementById("password_error");

            if (password !== confirmPassword) {
                errorText.classList.remove("hidden");
                return false;
            } else {
                errorText.classList.add("hidden");
                return true;
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
        <!-- Back Button -->
        <div class="absolute top-20 left-32">
        <a href="login.php" class="flex items-center text-gray-600 hover:text-gray-900 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
    </div>
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-lg">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>
        
        <div class="message">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="text-green-700 bg-green-100 border border-green-500 px-4 py-2 rounded-md text-center mb-4">
                    ✅ <?php echo $_SESSION['success']; ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="text-red-700 bg-red-100 border border-red-500 px-4 py-2 rounded-md text-center mb-4">
                    ❌ <?php echo $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </div>
        
        <form id="signupForm" action="signup.php" method="POST" enctype="multipart/form-data" onsubmit="return validatePassword()">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium">First Name</label>
                    <input type="text" name="first_name" class="w-full border border-gray-300 p-3 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Last Name</label>
                    <input type="text" name="last_name" class="w-full border border-gray-300 p-3 rounded-lg" required>
                </div>
            </div>
            
            <div class="mt-4">
                <label class="block text-gray-700 font-medium">Date of Birth</label>
                <input type="date" name="dob" class="w-full border border-gray-300 p-3 rounded-lg" required>
            </div>
            
            <div class="mt-4">
                <label class="block text-gray-700 font-medium">Gender</label>
                <select name="gender" class="w-full border border-gray-300 p-3 rounded-lg" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 font-medium">ID Proof Image</label>
                <input type="file" name="id_proof" class="w-full border border-gray-300 p-3 rounded-lg" required>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 font-medium">Mobile Number</label>
                <input type="tel" name="mobile" class="w-full border border-gray-300 p-3 rounded-lg" required>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 font-medium">Address</label>
                <textarea name="address" class="w-full border border-gray-300 p-3 rounded-lg" required></textarea>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 p-3 rounded-lg" required>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 font-medium">Password</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 p-3 rounded-lg" required>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 font-medium">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="w-full border border-gray-300 p-3 rounded-lg" required>
                <p id="password_error" class="text-red-500 text-sm mt-1 hidden">Passwords do not match.</p>
            </div>

            <button type="submit" class="w-full mt-6 bg-blue-600 text-white py-3 rounded-lg font-semibold text-lg hover:bg-blue-700">Sign Up</button>
        </form>
    </div>
</body>
</html>