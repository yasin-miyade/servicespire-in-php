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
    $from_location = isset($_POST['from_location']) ? trim($_POST['from_location']) : '';
    $to_location = isset($_POST['to_location']) ? trim($_POST['to_location']) : '';

    // Insert data into database
    $db = new db_functions();
    if ($db->insertWorkPost($name, $email, $mobile, $city, $work, $deadline, $reward, $message, $from_location, $to_location)) {
        $_SESSION['success'] = "Work posted successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Work post failed!";
        header("Location: " . $_SERVER['PHP_SELF']);
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
                <input type="email" name="email" required readonly class="w-full p-2 border rounded mb-4 bg-gray-200"
                    value="<?php echo $email; ?>" />

                <label class="block mb-2">Mobile Number</label>
                <input type="tel" name="mobile" required class="w-full p-2 border rounded mb-4" />

                <label class="block mb-2">City</label>
                <input type="text" name="city" required class="w-full p-2 border rounded mb-4" />

                <button type="button" onclick="nextStep()"
                    class="w-full bg-purple-600 text-white py-2 rounded">Next</button>
            </div>

            <!-- Step 2: Work Details -->
            <div class="form-step hidden" id="step2">
                <label class="block mb-2">Work</label>
                <input type="text" name="work" required class="w-full p-2 border rounded mb-4" />

                <label class="block mb-2">Deadline</label>
                <input type="date" name="deadline" required class="w-full p-2 border rounded mb-4" />

                <label class="block mb-2">Reward</label>
                <input type="text" name="reward" required class="w-full p-2 border rounded mb-4" />

                <label class="block mb-2">Message</label>
                <textarea name="message" required class="w-full p-2 border rounded mb-4"></textarea>

                <!-- Checkbox to enable location fields -->
                <div class="flex items-center gap-2 mb-4">
                    <input type="checkbox" id="enableLocations" class="w-5 h-5" onchange="toggleLocationStep()">
                    <label for="enableLocations" class="text-gray-800">Include From & To Location</label>
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="prevStep()" class="bg-gray-400 text-white py-2 px-4 rounded">Back</button>
                    <button type="submit" id="submitBtn" class="bg-green-500 text-white py-2 px-4 rounded">Submit</button>
                    <button type="button" id="nextBtn" onclick="nextStep()" class="bg-purple-600 text-white py-2 px-4 rounded hidden">Next</button>
                </div>
            </div>

            <!-- Step 3: Location Details (Hidden initially) -->
            <div class="form-step hidden" id="step3">
                <label class="block mb-2">From Location</label>
                <input type="text" name="from_location" class="w-full p-2 border rounded mb-4" />

                <label class="block mb-2">To Location</label>
                <input type="text" name="to_location" class="w-full p-2 border rounded mb-4" />

                <div class="flex justify-between">
                    <button type="button" onclick="prevStep()" class="bg-gray-400 text-white py-2 px-4 rounded">Back</button>
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
    let currentStep = 1;
    const totalSteps = 3;

    function showStep(step) {
        document.querySelectorAll(".form-step").forEach((el) => el.classList.add("hidden"));
        document.getElementById(`step${step}`).classList.remove("hidden");
        currentStep = step;
    }

    function nextStep() {
        if (currentStep === 2) {
            const isChecked = document.getElementById("enableLocations").checked;
            if (isChecked) {
                showStep(3); // Show Step 3 if checkbox is checked
            } else {
                document.getElementById("multiStepForm").submit(); // Submit the form if unchecked
            }
        } else if (currentStep < totalSteps) {
            showStep(currentStep + 1);
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            showStep(currentStep - 1);
        }
    }

    function toggleLocationStep() {
        const isChecked = document.getElementById("enableLocations").checked;
        document.getElementById("nextBtn").classList.toggle("hidden", !isChecked);
        document.getElementById("submitBtn").classList.toggle("hidden", isChecked);
    }

    // Ensure Step 1 is visible initially
    showStep(1);
    </script>
</body>
</html>
