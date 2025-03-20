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

?>
<div class="flex-1 p-6">
    <h2 class="text-3xl font-semibold mb-4">Dashboard</h2>
    <p class="text-gray-600 mb-6">Overview of recent activities and statistics.</p>
    
    <!-- Statistics Cards -->
    <div class="p-6 bg-blue-100 border-l-4 border-blue-500 rounded-lg shadow-md">
        <h3 class="text-lg font-bold">Total Requests</h3>
        <p class="text-3xl font-semibold">
            <?php
            require_once("../lib/function.php");
            $db = new db_functions();
            $total_requests = $db->getTotalRequests(); // Fetch total requests from the database
            echo htmlspecialchars($total_requests);
            ?>
        </p>
    </div>

    <!-- Added margin for better spacing -->
    <div class="mt-6"></div>

    <?php if (!empty($work_posts)) : ?>
        <div class="space-y-6">
            <?php foreach ($work_posts as $post) : ?>
                <?php $isHelperAssigned = $db->isHelperAssigned($post['id'], $helper_email); ?>
                <div class="bg-white shadow-lg border-l-8 border-purple-500 rounded-xl p-6 w-full">
                    <h3 class="text-xl font-semibold text-purple-700 mb-4 flex items-center gap-2">
                        <i class="fa fa-briefcase text-purple-600"></i> Work Opportunity
                    </h3>

                    <ul class="text-gray-800 space-y-3">
                        <li class="flex items-center gap-2">
                            <i class="fa fa-user text-purple-600"></i> 
                            <strong>Name:</strong> <?php echo htmlspecialchars($post['name']); ?>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa fa-phone text-purple-600"></i> 
                            <strong>Mobile No:</strong> 
                            <?php if ($isHelperAssigned) : ?>
                                <?php echo htmlspecialchars($post['mobile']); ?>
                            <?php else : ?>
                                <span class="text-red-500">Hidden</span>
                            <?php endif; ?>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa fa-map-marker-alt text-purple-600"></i> 
                            <strong>City:</strong> <?php echo htmlspecialchars($post['city']); ?>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa fa-cogs text-purple-600"></i> 
                            <strong>Work:</strong> <?php echo htmlspecialchars($post['work']); ?>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa fa-calendar text-purple-600"></i> 
                            <strong>Deadline:</strong> <?php echo htmlspecialchars($post['deadline']); ?>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa fa-dollar-sign text-purple-600"></i> 
                            <strong>Work Reward:</strong> 
                            <span class="text-green-600 font-bold"><?php echo htmlspecialchars($post['reward']); ?></span>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa fa-comment text-purple-600"></i> 
                            <strong>Message:</strong> 
                            <span class="italic text-gray-600">"<?php echo nl2br(htmlspecialchars($post['message'])); ?>"</span>
                        </li>
                    </ul>

                    <div class="mt-6 flex justify-between items-center">
                        <span class="text-gray-700 text-sm flex items-center gap-1">
                            <i class="fa fa-clock text-purple-600"></i> Posted on: <?php echo date("d M Y"); ?>
                        </span>

                        <?php if (!$isHelperAssigned) : ?>
                            <form method="POST">
                                <input type="hidden" name="help_post_id" value="<?php echo $post['id']; ?>">
                                <button type="submit" class="bg-purple-600 text-white font-semibold py-2 px-5 rounded-lg hover:bg-purple-700 transition-all">
                                    <i class="fa fa-handshake"></i> Help Them
                                </button>
                            </form>
                        <?php else : ?>
                            <button class="bg-gray-400 text-white font-semibold py-2 px-5 rounded-lg cursor-not-allowed">
                                Helping...
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p class="text-center text-gray-600 text-lg">No work posts available.</p>
    <?php endif; ?>
</div>