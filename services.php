

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<?php include 'header.php'; ?>
<div class="container mx-auto py-10 px-4 text-center mt-20">
    <h2 class="text-4xl font-bold mb-8 text-gray-800">Our <span class="text-purple-800">Services</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $services = [
            ["icon" => "shield-check", "color" => "text-blue-600", "title" => "Secure Payments", "description" => "We use SSL encryption and trusted payment gateways like PayPal, Stripe, and Razorpay to ensure your transactions are safe. Our fraud detection system adds an extra layer of security.", "svg" => "<i class='fas fa-lock text-blue-600 text-4xl'></i>"],
            ["icon" => "message-square", "color" => "text-green-600", "title" => "Communication", "description" => "Our seamless messaging system allows real-time interaction. With push notifications, email alerts, and in-app chat, you’re always connected and informed.", "svg" => "<i class='fas fa-comments text-green-600 text-4xl'></i>"],
            ["icon" => "check-circle", "color" => "text-purple-600", "title" => "Accountability", "description" => "We ensure full transparency in our processes. Every transaction, request, and response is logged, providing a trackable and fair system for our users.", "svg" => "<i class='fas fa-user-check text-purple-600 text-4xl'></i>"],
            ["icon" => "users", "color" => "text-red-600", "title" => "Reliable Services", "description" => "Our services are vetted, reviewed, and monitored for quality assurance. Customer feedback ensures consistent improvements and high satisfaction rates.", "svg" => "<i class='fas fa-handshake text-red-600 text-4xl'></i>"],
            ["icon" => "trending-up", "color" => "text-yellow-600", "title" => "R&D Investment", "description" => "We invest in cutting-edge technology, AI-powered automation, and advanced analytics to keep our services ahead of the curve.", "svg" => "<i class='fas fa-flask text-yellow-600 text-4xl'></i>"],
            ["icon" => "dollar-sign", "color" => "text-teal-600", "title" => "Our Partners", "description" => "We collaborate with top brands and service providers globally, building relationships based on trust, transparency, and shared growth.", "svg" => "<i class='fas fa-hand-holding-usd text-teal-600 text-4xl'></i>"]
        ];
        
        foreach ($services as $service) {
            echo "<div class='p-6 shadow-lg rounded-2xl transition-transform transform hover:-translate-y-2 hover:shadow-2xl bg-white'>";
            echo "<div class='flex flex-col items-center text-center space-y-4'>";
            echo $service['svg'];
            echo "<h3 class='text-xl font-semibold text-gray-700'>" . $service['title'] . "</h3>";
            echo "<p class='text-gray-600'>" . $service['description'] . "</p>";
            echo "</div></div>";
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>


</body>
</html>