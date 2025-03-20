<?php
// session_start();
require_once('../lib/function.php');

$db = new db_functions();
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = trim($_POST['address']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id_proof = $_POST['id_proof'];
    $id_proof_file = null;

    if (isset($_FILES['id_proof_file']) && $_FILES['id_proof_file']['error'] == 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($_FILES["id_proof_file"]["name"]);
        
        if (move_uploaded_file($_FILES["id_proof_file"]["tmp_name"], $target_file)) {
            $id_proof_file = $target_file;
        } else {
            $id_proof_file = null;
        }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif ($db->is_email_exists($email)) { 
        $error_message = "This email is already registered. Please use another email.";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $password)) {
        $error_message = "Password must be at least 6 characters long and include one uppercase, one lowercase, one number, and one special character.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        $register_success = $db->register_user($first_name, $last_name, $email, $mobile, $gender, $dob, $address, $password, $id_proof, $id_proof_file);
    
        if ($register_success) {
            $_SESSION['success_message'] = "Registration successful!";
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Error registering user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: transparent;
        }
        input, select {
            transition: all 0.3s ease-in-out;
        }
        input:hover, select:hover {
            transform: scale(1.02);
            box-shadow: 0 0 10px rgba(128, 0, 128, 0.5);
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen p-4">

        <!-- Back Button -->
    <div class="absolute top-20 left-32">
        <a href="login.php" class="flex items-center text-gray-600 hover:text-gray-900 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
    </div>

    <div class="w-full max-w-lg bg-white bg-opacity-90 shadow-2xl p-8 rounded-3xl border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-700 mb-6">Create an Account</h2>
        
        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($error_message); ?></span>
            </div>
        <?php endif; ?>

        <form class="space-y-5" method="POST" action="signup.php" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 mb-1 font-medium">First Name</label>
                    <input type="text" name="first_name" required 
                           value="<?php echo htmlspecialchars($_POST['first_name'] ?? ''); ?>"
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" />
                </div>
                <div>
                    <label class="block text-gray-600 mb-1 font-medium">Last Name</label>
                    <input type="text" name="last_name" required 
                           value="<?php echo htmlspecialchars($_POST['last_name'] ?? ''); ?>"
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" />
                </div>
            </div>
            <div>
                <label class="block text-gray-600 mb-1 font-medium">Email</label>
                <input type="email" name="email" required 
                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                       class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" />
            </div>
            <div>
                <label class="block text-gray-600 mb-1 font-medium">Mobile Number</label>
                <input type="tel" name="mobile" required 
       value="<?php echo htmlspecialchars($_POST['mobile'] ?? ''); ?>"
       class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400"
       maxlength="10"
       pattern="\d{10}"
       oninput="validateMobile(this)" />

            </div>
            <div>
                <label class="block text-gray-600 mb-1 font-medium">Gender</label>
                <select name="gender" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" required>
                    <option value="">Select Gender</option>
                    <option value="male" <?php echo (($_POST['gender'] ?? '') === 'male') ? 'selected' : ''; ?>>Male</option>
                    <option value="female" <?php echo (($_POST['gender'] ?? '') === 'female') ? 'selected' : ''; ?>>Female</option>
                    <option value="other" <?php echo (($_POST['gender'] ?? '') === 'other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-600 mb-1 font-medium">Date of Birth</label>
                <input type="date" name="dob" required 
                       value="<?php echo htmlspecialchars($_POST['dob'] ?? ''); ?>"
                       class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" />
            </div>
            <div>
                <label class="block text-gray-600 mb-1 font-medium">Address</label>
                <input type="text" name="address" required 
                       value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>"
                       class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" />
            </div>
            <div>
                <label class="block text-gray-600 mb-1 font-medium">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required 
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" />
                    <button type="button" onclick="togglePassword('password')" 
                            class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">👁</button>
                </div>
            </div>
            <div>
                <label class="block text-gray-600 mb-1 font-medium">Confirm Password</label>
                <div class="relative">
                    <input id="confirmPassword" name="confirm_password" type="password" required 
                           class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" />
                    <button type="button" onclick="togglePassword('confirmPassword')" 
                            class="absolute right-3 top-3 text-gray-500 hover:text-gray-700">👁</button>
                </div>
            </div>
            <div>
                <label class="block text-gray-600 mb-1 font-medium">ID Proof</label>
                <select id="idProof" name="id_proof" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" 
                        onchange="toggleFileUpload()" required>
                    <option value="">Select ID Proof</option>
                    <option value="aadhaar" <?php echo (($_POST['id_proof'] ?? '') === 'aadhaar') ? 'selected' : ''; ?>>Aadhaar Card</option>
                    <option value="pan" <?php echo (($_POST['id_proof'] ?? '') === 'pan') ? 'selected' : ''; ?>>PAN Card</option>
                    <option value="voter" <?php echo (($_POST['id_proof'] ?? '') === 'voter') ? 'selected' : ''; ?>>Voter ID</option>
                </select>
            </div>
            <div id="fileUpload" class="hidden">
                <label class="block text-gray-600 mb-1 font-medium">Upload Document (Max 500KB)</label>
                <input type="file" name="id_proof_file" accept="image/*,application/pdf" 
                       class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-purple-400" />
            </div>
            <button type="submit" 
                    class="w-full bg-purple-500 text-white py-3 rounded-lg hover:bg-purple-600 transition font-semibold">
                Sign Up
            </button>
        </form>
        
        <p class="text-center mt-6 text-gray-600">
            Already have an account? 
            <a href="login.php" class="text-purple-500 hover:text-purple-700 font-semibold">Login here</a>
        </p>
    </div>
    
    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }

        function toggleFileUpload() {
            const idProof = document.getElementById("idProof").value;
            const fileUpload = document.getElementById("fileUpload");
            fileUpload.classList.toggle("hidden", !idProof);
        }
        
    function validateMobile(input) {
        input.value = input.value.replace(/\D/g, '').slice(0, 10);
    }


    </script>
</body>
</html>