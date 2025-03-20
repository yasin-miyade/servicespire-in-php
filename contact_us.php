<?php
session_start();
require_once('lib/function.php');

$db = new db_functions();
$flag = $_SESSION['flag'] ?? 0; // Retrieve flag value from session
unset($_SESSION['flag']); // Clear flag after use

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $var_username = $_POST['username'] ?? '';
    $var_email = $_POST['email'] ?? '';
    $var_phone = $_POST['phone'] ?? ''; 
    $var_message = $_POST['message'] ?? '';

    if (!empty($var_username) && !empty($var_email) && !empty($var_message)) {
        if ($db->save_contact_data($var_username, $var_email, $var_phone, $var_message)) {
            $_SESSION['flag'] = 1; // Success
        } else {
            $_SESSION['flag'] = 2; // Error
        }
    } else {
        $_SESSION['flag'] = 3; // Validation error
    }
    
    header("Location: contact_us.php"); // Redirect to avoid resubmission on refresh
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | ServiceSpire</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<?php include 'header.php'; ?>

<!-- Main Content -->
<div class="container mx-auto px-6 pt-24 pb-12">
    <div class="flex flex-wrap lg:flex-nowrap mt-10 gap-8">

        <!-- Contact Info -->
        <div class="w-full lg:w-1/2 ml-20 mt-10">
            <h2 class="text-3xl font-bold text-gray-900">GET IN TOUCH WITH <span class="text-purple-600">US</span></h2>
            <p class="text-gray-500 mt-3">We are here to assist you. Reach out to us for any inquiries.</p>

            <div class="mt-6 space-y-4">
                <!-- <div class="flex items-center gap-4">
                    <span class="text-pink-500 text-xl">📍</span>
                    <div>
                        <p class="font-semibold text-gray-800">Our Location</p>
                        <p class="text-gray-600">99 St. Jomblo Park, Pekanbaru, 28292, Indonesia</p>
                    </div>
                </div> -->

                <div class="flex items-center gap-4">
                    <span class="text-red-500 text-xl">📞</span>
                    <div>
                        <p class="font-semibold text-gray-800">Phone Number</p>
                        <p class="text-gray-600">+91 9604364376</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-gray-500 text-xl">📧</span>
                    <div>
                        <p class="font-semibold text-gray-800">Email Address</p>
                        <p class="text-gray-600">servicespire@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="w-full lg:w-1/3 bg-white p-8 rounded-lg shadow-lg mt-10">
            <h2 class="text-2xl font-semibold text-gray-900 text-center">CONTACT <span class="text-purple-600">US</span></h2>

            <!-- Success/Error Messages -->
            <?php if ($flag == 1): ?>
                <p class="text-green-600 text-center mt-4">✅ Your message has been sent successfully!</p>
            <?php elseif ($flag == 2): ?>
                <p class="text-red-600 text-center mt-4">❌ Something went wrong. Please try again.</p>
            <?php elseif ($flag == 3): ?>
                <p class="text-yellow-600 text-center mt-4">⚠️ Please fill out all required fields.</p>
            <?php endif; ?>

            <!-- Contact Form -->
            <form action="contact_us.php" method="POST" class="mt-6 space-y-4">
                <input type="text" name="username" placeholder="Your Name" required 
                       class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                
                <input type="email" name="email" placeholder="Your Email" required 
                       class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                
                <input type="text" name="phone" placeholder="Your Phone (Optional)" 
                       class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                
                <textarea name="message" rows="4" placeholder="Your Message" required 
                          class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                
                <button type="submit" 
                        class="w-full bg-purple-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-purple-700 transition">
                    Send Message
                </button>
            </form>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
