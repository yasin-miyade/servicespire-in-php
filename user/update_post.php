<?php
session_start();
require_once("../lib/function.php");

if (!isset($_SESSION['email'])) {
    die("Unauthorized access.");
}

$db = new db_functions();
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $post_id = $_POST['post_id'];
    $work = htmlspecialchars($_POST['work']);
    $city = htmlspecialchars($_POST['city']);
    $deadline = htmlspecialchars($_POST['deadline']);
    $reward = htmlspecialchars($_POST['reward']);
    $message = htmlspecialchars($_POST['message']);

    // Update the database
    $updated = $db->updateUserWorkPost($post_id, $email, $work, $city, $deadline, $reward, $message);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-md">
    <?php if ($updated): ?>
        <h2 class="text-2xl font-bold text-green-600 mb-4">✅ Post Updated Successfully!</h2>
        <p class="text-gray-700 mb-6">Your work post has been successfully updated.</p>
    <?php else: ?>
        <h2 class="text-2xl font-bold text-red-600 mb-4">❌ Update Failed</h2>
        <p class="text-gray-700 mb-6">Something went wrong. Please try again.</p>
    <?php endif; ?>

    <!-- Button to return to user's My Work Posts dashboard -->
    <a href="index.php" class="bg-purple-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-purple-700 transition-all">
        🔙 Go to My Work Posts
    </a>
</div>

</body>
</html>