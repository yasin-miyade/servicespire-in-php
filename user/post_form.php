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
    $from_location = trim($_POST['from_location']);
    $to_location = trim($_POST['to_location']);

    // Insert data into database
    $db = new db_functions();
    if ($db->insertWorkPost($name, $email, $mobile, $city, $work, $deadline, $reward, $message, $from_location, $to_location)) {
        $_SESSION['success'] = "Work posted successfully!";
        header("Location: index.php");
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
    <title>Multi-Step Work Post Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100 p-6">
    <div class="max-w-lg w-full bg-white p-8 rounded-xl shadow-lg ml-64 mt-20">
        <h2 class="text-2xl font-bold text-center mb-6">Create a Work Post</h2>
        
        <form id="multiStepForm" method="POST">
            <!-- Step 1: Personal Information -->
            <div class="form-step" id="step1">
                <label class="block mb-2">Name</label>
                <input type="text" name="name" required class="w-full p-2 border rounded mb-4" />
                
                <label class="block mb-2">Email</label>
                <input type="email" name="email" required readonly class="w-full p-2 border rounded mb-4 bg-gray-200" value="<?php echo $email; ?>" />
                
                <label class="block mb-2">Mobile Number</label>
                <input type="tel" name="mobile" required class="w-full p-2 border rounded mb-4" />
                
                <label class="block mb-2">City</label>
                <input type="text" name="city" required class="w-full p-2 border rounded mb-4" />
                
                <button type="button" onclick="nextStep(1)" class="w-full bg-blue-500 text-white py-2 rounded">Next</button>
            </div>
            
            <!-- Step 2: Work Details (Hidden initially) -->
            <div class="form-step hidden" id="step2">
                <label class="block mb-2">Work</label>
                <input type="text" name="work" required class="w-full p-2 border rounded mb-4" />
                
                <label class="block mb-2">Deadline</label>
                <input type="date" name="deadline" required class="w-full p-2 border rounded mb-4" />
                
                <label class="block mb-2">Reward</label>
                <input type="text" name="reward" required class="w-full p-2 border rounded mb-4" />
                
                <label class="block mb-2">Message</label>
                <textarea name="message" required class="w-full p-2 border rounded mb-4"></textarea>
                
                <div class="flex justify-between">
                    <button type="button" onclick="prevStep(1)" class="bg-gray-400 text-white py-2 px-4 rounded">Back</button>
                    <button type="button" onclick="nextStep(2)" class="bg-blue-500 text-white py-2 px-4 rounded">Next</button>
                </div>
            </div>
            
            <!-- Step 3: Location Details (Hidden initially) -->
            <div class="form-step hidden" id="step3">
                <label class="block mb-2">From Location</label>
                <input type="text" name="from_location" required class="w-full p-2 border rounded mb-4" />
                
                <label class="block mb-2">To Location</label>
                <input type="text" name="to_location" required class="w-full p-2 border rounded mb-4" />
                
                <div class="flex justify-between">
                    <button type="button" onclick="prevStep(2)" class="bg-gray-400 text-white py-2 px-4 rounded">Back</button>
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        let currentStep = 1;
        
        function nextStep(step) {
            document.getElementById(`step${step}`).classList.add('hidden');
            document.getElementById(`step${step + 1}`).classList.remove('hidden');
            currentStep++;
        }
        
        function prevStep(step) {
            document.getElementById(`step${step}`).classList.add('hidden');
            document.getElementById(`step${step - 1}`).classList.remove('hidden');
            currentStep--;
        }
    </script>
</body>
</html>
