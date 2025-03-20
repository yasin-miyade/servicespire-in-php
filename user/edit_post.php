<?php
session_start();
require_once("../lib/function.php");

// Ensure user is logged in
if (!isset($_SESSION['email'])) {
    die("Unauthorized access.");
}

$email = $_SESSION['email'];
$db = new db_functions();

// Check if post ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid request.");
}

$post_id = $_GET['id'];
$post = $db->getUserWorkPostById($post_id, $email);

if (!$post) {
    die("Post not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Work Post</title>
    <link href="../assets/css/style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-10">
    <h2 class="text-3xl font-bold text-purple-700 text-center mb-6">Edit Work Post</h2>

    <form action="update_post.php" method="POST">
        <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post['id']); ?>">

        <label class="block mb-2 text-sm font-medium text-gray-900">Work:</label>
        <input type="text" name="work" value="<?php echo htmlspecialchars($post['work']); ?>" class="w-full p-2 border rounded-lg mb-4">

        <label class="block mb-2 text-sm font-medium text-gray-900">City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($post['city']); ?>" class="w-full p-2 border rounded-lg mb-4">

        <label class="block mb-2 text-sm font-medium text-gray-900">Deadline:</label>
        <input type="date" name="deadline" value="<?php echo htmlspecialchars($post['deadline']); ?>" class="w-full p-2 border rounded-lg mb-4">

        <label class="block mb-2 text-sm font-medium text-gray-900">Work Reward:</label>
        <input type="text" name="reward" value="<?php echo htmlspecialchars($post['reward']); ?>" class="w-full p-2 border rounded-lg mb-4">

        <label class="block mb-2 text-sm font-medium text-gray-900">Message:</label>
        <textarea name="message" class="w-full p-2 border rounded-lg mb-4"><?php echo htmlspecialchars($post['message']); ?></textarea>

        <button type="submit" class="bg-purple-600 text-white py-2 px-6 rounded-lg">Update Post</button>
    </form>
</div>

</body>
</html>