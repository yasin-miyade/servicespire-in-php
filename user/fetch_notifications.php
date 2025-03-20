<?php
session_start();
require_once("../lib/function.php");

if (!isset($_SESSION['email'])) {
    echo "<p class='text-gray-600 text-center text-lg font-semibold p-4'>🚫 Unauthorized access!</p>";
    exit;
}

$db = new db_functions();
$user_email = $_SESSION['email'];
$notifications = $db->getUserNotifications($user_email);

if (!empty($notifications)) {
    echo '<ul class="space-y-4 p-4">'; // Adds spacing between notifications
    foreach ($notifications as $note) {
        // Get helper email
        $helper_email = htmlspecialchars($note['helper_email'] ?? 'Unknown');

        echo '<li class="flex items-center bg-white shadow-lg rounded-lg border border-gray-200 p-4 space-x-4 transition duration-300 hover:shadow-xl">
                <div class="flex items-center justify-center w-12 h-12 bg-blue-100 text-blue-600 rounded-full text-xl">
                    <i class="fa fa-bell"></i>
                </div>
                <div class="flex-1">
                    <p class="text-gray-900 font-semibold text-lg">Helper: <span class="text-blue-600">' . $helper_email . '</span></p>
                    <p class="text-gray-700">' . htmlspecialchars($note['notification']) . '</p>
                </div>
                <span class="text-gray-400 text-sm">' . date("M d, Y h:i A") . '</span> <!-- Adds a placeholder timestamp -->
              </li>';
    }
    echo '</ul>';
} else {
    echo "<p class='text-gray-500 text-center text-lg font-medium p-6'>🔔 No notifications available.</p>";
}
?>