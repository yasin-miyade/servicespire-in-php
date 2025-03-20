<?php
session_start();
require_once("../lib/function.php");

if (!isset($_SESSION['email'])) {
    echo "Unauthorized access!";
    exit;
}

$user_email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdn.tailwindcss.com">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
</head>
<body class="bg-gray-100 font-inter p-6">
    <h2 class="text-2xl font-semibold mb-4">Notifications</h2>

    <ul id="notification-list" class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <p class="text-gray-600">Loading notifications...</p>
    </ul>

    <script>
        function fetchNotifications() {
            $.ajax({
                url: "fetch_notifications.php", // Now inside /user folder
                type: "GET",
                success: function (data) {
                    $("#notification-list").html(data);
                }
            });
        }

        $(document).ready(function () {
            fetchNotifications();  // Fetch on page load
            setInterval(fetchNotifications, 5000); // Refresh every 5 seconds
        });
    </script>
</body>
</html>