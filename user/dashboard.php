<?php
session_start();
require_once("../lib/function.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    die("Unauthorized access. Please log in first.");
}

$email = $_SESSION['email'];

// Initialize database connection
$db = new db_functions();
$work_posts = $db->getUserWorkPosts($email);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="../assets/css/style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 to-purple-200 font-inter">

<div class="max-w-6xl mx-auto p-8">
    
    <h2 class="text-4xl font-extrabold text-center text-purple-800 mb-8">📌 My Work Posts

    <a href="">
    <div class="flex flex-col place-items-end -mt-16 ml-4">
            <div class="relative cursor-pointer" id="profilePhotoContainer">
                <img id="profilePhoto" src="https://via.placeholder.com/150" class="w-20 h-20 border-4 border-gray-300 rounded-full shadow-lg" />
                <input type="file" id="photoInput" class="hidden" accept="image/*">
            </div>
        </div>
    </h2>

    <?php if ($work_posts->num_rows > 0) : ?>
        <div class="space-y-8">
            <?php while ($post = $work_posts->fetch_assoc()) : ?>
                <div class="relative bg-white shadow-lg border-l-8 border-purple-500 rounded-xl overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all w-full">
                    
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-purple-700 mb-4 flex items-center gap-2">
                            <i class="ph ph-briefcase text-purple-600"></i> Your Work
                        </h3>

                        <ul class="text-gray-800 space-y-3">
                            <li class="flex items-center gap-2">
                                <i class="ph ph-user text-purple-600"></i> 
                                <strong>Name:</strong> <?php echo htmlspecialchars($post['name']); ?>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="ph ph-phone text-purple-600"></i> 
                                <strong>Mobile:</strong> <?php echo htmlspecialchars($post['mobile']); ?>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="ph ph-map-pin text-purple-600"></i> 
                                <strong>City:</strong> <?php echo htmlspecialchars($post['city']); ?>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="ph ph-gear text-purple-600"></i> 
                                <strong>Work:</strong> <?php echo htmlspecialchars($post['work']); ?>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="ph ph-calendar text-purple-600"></i> 
                                <strong>Deadline:</strong> <?php echo htmlspecialchars($post['deadline']); ?>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="ph ph-currency-circle-dollar text-purple-600"></i> 
                                <strong>Work Reward:</strong> 
                                <span class="text-green-600 font-bold"><?php echo htmlspecialchars($post['reward']); ?></span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="ph ph-chat-circle-dots text-purple-600"></i> 
                                <strong>Message:</strong> 
                                <span class="italic text-gray-600">"<?php echo nl2br(htmlspecialchars($post['message'])); ?>"</span>
                            </li>
                        </ul>

                        <div class="mt-6 flex justify-between items-center">
                            <span class="text-gray-700 text-sm flex items-center gap-1">
                                <i class="ph ph-clock text-purple-600"></i> Posted on: <?php echo date("d M Y", strtotime($post['created_at'])); ?>
                            </span>
                            <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="bg-purple-600 text-white font-semibold py-2 px-5 rounded-lg hover:bg-purple-700 transition-all flex items-center gap-2">
                                <i class="ph ph-pencil-simple"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p class="text-center text-gray-600 text-lg">No work posts available.</p>
    <?php endif; ?>
</div>

</body>
</html>