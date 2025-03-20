<?php
ob_start();
session_start(); // Ensure session is started

require_once('../lib/function.php'); // Include database connection

// Ensure user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email']; // Get logged-in user's email
$flag = 0;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']); // Ensure email is captured
    $mobile = trim($_POST['mobile']);
    $city = trim($_POST['city']);
    $work = trim($_POST['work']);
    $deadline = trim($_POST['deadline']);
    $reward = trim($_POST['reward']);
    $message = trim($_POST['message']);

    // Insert data into database
    $db = new db_functions();
    if ($db->insertWorkPost($name, $email, $mobile, $city, $work, $deadline, $reward, $message)) {
        $_SESSION['success'] = "Work posted successfully!";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        $_SESSION['error'] = "Work post failed!";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Post Form</title>
    <link href="../assets/css/style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Floating label effect */
        .input-container {
            position: relative;
        }

        .input-container label {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            padding: 0 5px;
            color: #6b7280; /* Gray */
            transition: all 0.3s ease-in-out;
            pointer-events: none;
        }

        .glow-input:focus ~ label,
        .glow-input:not(:placeholder-shown) ~ label {
            top: 0;
            left: 10px;
            font-size: 12px;
            color: #4F46E5; /* Indigo */
        }

        /* Hover effect on placeholder */
        .glow-input::placeholder {
            color: transparent;
        }

        .glow-input:hover::placeholder,
        .glow-input:focus::placeholder {
            color: #a3a3a3;
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen bg-gradient-to-br from-blue-50 via-indigo-100 to-purple-200 p-6">

<div class="relative max-w-lg w-full bg-white/90 backdrop-blur-md border border-gray-300 rounded-2xl shadow-2xl p-8 overflow-hidden ml-72">
    
    <!-- Display session messages -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            ✅ <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            ❌ <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <!-- Title -->
    <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-6">Create a Work Post</h2>

    <form id="postForm" action="" method="POST">
        <div class="grid grid-cols-1 gap-6">
            <!-- Name -->
            <div class="input-container">
                <input type="text" name="name" required class="glow-input w-full p-4 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder=" " />
                <label>Name</label>
            </div>

            <!-- Email (Auto-filled) -->
            <div class="input-container">
                <input type="email" name="email" value="<?php echo $email; ?>" readonly required class="glow-input w-full p-4 border border-gray-300 rounded-lg bg-gray-200 text-gray-900 cursor-not-allowed" />
                <label>Email (Auto-filled)</label>
            </div>

            <!-- Mobile -->
            <div class="input-container">
                <input type="tel" name="mobile" required class="glow-input w-full p-4 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder=" " />
                <label>Mobile Number</label>
            </div>

            <!-- City -->
            <div class="input-container">
                <input type="text" name="city" required class="glow-input w-full p-4 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder=" " />
                <label>City</label>
            </div>

            <!-- Work -->
            <div class="input-container">
                <input type="text" name="work" required class="glow-input w-full p-4 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder=" " />
                <label>Work</label>
            </div>

            <!-- Deadline -->
            <div class="input-container">
                <input type="date" name="deadline" required class="glow-input w-full p-4 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                <label>Deadline</label>
            </div>

            <!-- Reward -->
            <div class="input-container">
                <input type="text" name="reward" required class="glow-input w-full p-4 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder=" " />
                <label>Work Reward</label>
            </div>

            <!-- Message -->
            <div class="input-container">
                <textarea name="message" rows="4" required class="glow-input w-full p-4 border border-gray-300 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder=" "></textarea>
                <label>Message</label>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-4 text-white bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 rounded-lg shadow-lg font-semibold text-lg focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all transform hover:scale-105 active:scale-95 mt-4">
            Submit
        </button>
    </form>
</div>

</body>
</html>