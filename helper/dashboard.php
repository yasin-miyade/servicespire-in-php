<?php
require_once("../lib/function.php");
$db = new db_functions();
$work_posts = $db->getWorkPosts();
$helper_email = "helper@example.com"; // Replace with session email

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['help_post_id'])) {
    $post_id = $_POST['help_post_id'];
    $db->assignHelper($post_id, $helper_email);
    $post_owner = $db->getUserByPostId($post_id);
    
    // Send notification
    $db->sendNotification($post_id, "A helper has shown interest in your work post.");
}

///completed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complete_post_id'])) {
    $post_id = $_POST['complete_post_id'];

    // Update task status to 'completed'
    $updateQuery = "UPDATE work_posts SET status = 'completed' WHERE id = ?";
    $stmt = $db->conn->prepare($updateQuery);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    
    // Optionally, send a notification to the user
    $db->sendNotification($post_id, "Your work post has been marked as completed.");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Dashboard</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-gradient-to-br from-purple-50 to-purple-100 font-inter">
    <div class="max-w-6xl mx-auto p-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-semibold mb-4 text-purple-800">Dashboard</h2>
            <p class="text-gray-600">Overview of recent activities and statistics.</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Requests -->
    <div class="bg-white shadow-lg border-l-8 border-purple-500 rounded-xl p-6">
        <h3 class="text-xl font-semibold text-purple-700 mb-4 flex items-center gap-2">
            <i class="ph ph-chart-bar text-purple-600"></i> Total Requests
        </h3>
        <p class="text-3xl font-semibold">
            <?php echo htmlspecialchars($db->getTotalRequests()); ?>
        </p>
    </div>

    <!-- Pending Requests -->
    <div class="bg-white shadow-lg border-l-8 border-yellow-500 rounded-xl p-6">
        <h3 class="text-xl font-semibold text-yellow-700 mb-4 flex items-center gap-2">
            <i class="ph ph-clock text-yellow-600"></i> Pending Requests
        </h3>
        <p class="text-3xl font-semibold">
            <?php echo htmlspecialchars($db->getPendingRequests()); ?>
        </p>
    </div>

    <!-- Completed Tasks -->
    <div class="bg-white shadow-lg border-l-8 border-green-500 rounded-xl p-6">
        <h3 class="text-xl font-semibold text-green-700 mb-4 flex items-center gap-2">
            <i class="ph ph-check-circle text-green-600"></i> Completed Tasks
        </h3>
        <p class="text-3xl font-semibold">
            <?php echo htmlspecialchars($db->getCompletedTasks()); ?>
        </p>
    </div>
</div>


        <!-- Work Posts Section -->
        <?php if (!empty($work_posts)) : ?>
            <div class="grid grid-cols-1 gap-8">
                <?php foreach ($work_posts as $post) : ?>
                    <?php $isHelperAssigned = $db->isHelperAssigned($post['id'], $helper_email); ?>
                    <div class="relative bg-white shadow-lg border-l-8 border-purple-500 rounded-xl overflow-hidden transform hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <div class="p-8">
                            <!-- Post Title -->
                            <h3 class="text-2xl font-semibold text-purple-700 mb-6 flex items-center gap-2">
                                <i class="ph ph-briefcase text-purple-600"></i> Work Opportunity
                            </h3>

                            <!-- Post Details -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-800">
                                <div class="flex items-center gap-3">
                                    <i class="ph ph-user text-purple-600"></i>
                                    <strong>Name:</strong> <?php echo htmlspecialchars($post['name']); ?>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="ph ph-phone text-purple-600"></i>
                                    <strong>Mobile No:</strong> 
                                    <?php if ($isHelperAssigned) : ?>
                                        <?php echo htmlspecialchars($post['mobile']); ?>
                                    <?php else : ?>
                                        <span class="text-red-500">Hidden</span>
                                    <?php endif; ?>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="ph ph-map-pin text-purple-600"></i>
                                    <strong>City:</strong> <?php echo htmlspecialchars($post['city']); ?>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="ph ph-gear text-purple-600"></i>
                                    <strong>Work:</strong> <?php echo htmlspecialchars($post['work']); ?>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="ph ph-calendar text-purple-600"></i>
                                    <strong>Deadline:</strong> <?php echo htmlspecialchars($post['deadline']); ?>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="ph ph-currency-circle-dollar text-purple-600"></i>
                                    <strong>Work Reward:</strong>
                                    <span class="text-green-600 font-bold"><?php echo htmlspecialchars($post['reward']); ?></span>
                                </div>
                                <div class="col-span-2 flex items-start gap-3">
                                    <i class="ph ph-chat-circle-dots text-purple-600"></i>
                                    <strong>Message:</strong>
                                    <span class="italic text-gray-600">"<?php echo nl2br(htmlspecialchars($post['message'])); ?>"</span>
                                </div>
                            </div>

                            <!-- Post Footer -->
                            <div class="mt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                                <span class="text-gray-700 text-sm flex items-center gap-2">
                                    <i class="ph ph-clock text-purple-600"></i> Posted on: <?php echo date("d M Y"); ?>
                                </span>

                                <?php if (!$isHelperAssigned) : ?>
                                    <form method="POST">
                                        <input type="hidden" name="help_post_id" value="<?php echo $post['id']; ?>">
                                        <button type="submit" class="bg-purple-600 text-white font-semibold py-2 px-5 rounded-lg hover:bg-purple-700 transition-all flex items-center gap-2">
                                            <i class="ph ph-handshake"></i> Help Them
                                        </button>
                                    </form>
                                <?php else : ?>
                                    <button class="bg-gray-400 text-white font-semibold py-2 px-5 rounded-lg cursor-not-allowed flex items-center gap-2">
                                        <i class="ph ph-check"></i> Helping...
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="text-center text-gray-600 text-lg">No work posts available.</p>
        <?php endif; ?>
    </div>
</body>

</html>