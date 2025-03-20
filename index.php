<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ServiceSpire</title>
    <!-- <link rel="stylesheet" href="/public/assets/css/output.css"> -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <?php include 'header.php'; ?>
    <section class="flex justify-between items-center h-screen bg-white">
        <div class="flex justify-center flex-col pl-20 mt-40 gap-5">
            <p class="text-purple-900 font-bold text-2xl">We Make IT Possible</p>
            <h1 class="text-7xl font-bold text-gray-900">
                Service with a Purpose,<br> Help with a Heart
            </h1>
            <p class="text-xl mt-5">Your needs, our priority delivered with care</p>
            <a href="about.php"
                class="text-white bg-purple-600 hover:bg-purple-800 font-medium rounded-lg text-sm px-4 py-2.5 mt-5 w-32 text-center">Learn
                More</a>

            <div style="margin-top: -10px; margin-left: 300px;">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" width="200" height="160">
                    <!-- First Curve -->
                    <path d="M30 40 Q100 120, 170 140" stroke="#6A00D4" stroke-width="4" fill="none"
                        stroke-linecap="round" />

                    <!-- Second Curve -->
                    <path d="M35 70 Q120 160, 220 170" stroke="#6A00D4" stroke-width="4" fill="none"
                        stroke-linecap="round" />

                    <!-- Dots -->
                    <circle cx="170" cy="140" r="6" fill="#6A00D4" />
                    <circle cx="218" cy="170" r="6" fill="#6A00D4" />
                </svg>
            </div>

        </div>

        <div class="flex justify-center mt-35  w-80">
            <img src="assets/images/Web1.jpg" alt="Web Image" class=" max-w-lg mt-36 mr-48">
        </div>
    </section>


    <!-- Our Aim Section -->
    <section style="width:100vw; text-align:center; padding:80px 5%; box-sizing:border-box; margin:0;">
        <h2 style="font-size:42px; margin-bottom:30px; color:#222;">Our Aim</h2>
        <p style="font-size:20px; max-width:900px; margin:auto; color:#555;">
            At ServicePire, our mission is to connect people who need help with those willing to provide assistance,
            creating a compassionate and collaborative community.
        </p>
    </section>


    <section class="py-20 text-center">
    <h2 class="text-4xl font-bold text-gray-900 mb-10">Why Choose <span class="text-purple-600">ServiceSpire?</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 px-10">
        <div class="p-6 shadow-lg rounded-lg bg-white hover:shadow-2xl">
            <i class="fa-solid fa-check-circle text-5xl text-green-600 mb-4"></i>
            <h3 class="text-xl font-semibold">Verified Helpers</h3>
            <p class="text-gray-600">All service providers are background-checked for safety.</p>
        </div>
        <div class="p-6 shadow-lg rounded-lg bg-white hover:shadow-2xl">
            <i class="fa-solid fa-wallet text-5xl text-blue-600 mb-4"></i>
            <h3 class="text-xl font-semibold">Secure Payments</h3>
            <p class="text-gray-600">We ensure hassle-free transactions with secure payment gateways.</p>
        </div>
        <div class="p-6 shadow-lg rounded-lg bg-white hover:shadow-2xl">
            <i class="fa-solid fa-headset text-5xl text-purple-700 mb-4"></i>
            <h3 class="text-xl font-semibold">24/7 Support</h3>
            <p class="text-gray-600">Our team is available round the clock for assistance.</p>
        </div>
    </div>
</section>


<section class="py-20 bg-gray-100">
    <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">How It Works</h2>
    
    <div class="relative max-w-4xl mx-auto">
        <!-- Timeline Container -->
        <div class="relative border-l-4 border-purple-600 ml-8">
            
            <!-- Step 1 -->
            <div class="mb-10 ml-8 flex items-start">
                <div class="w-10 h-10 bg-purple-700 text-white flex items-center justify-center rounded-full text-2xl absolute -left-5">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-lg w-full">
                    <h3 class="text-xl font-semibold">Sign Up</h3>
                    <p class="text-gray-600">Create your free account in minutes.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="mb-10 ml-8 flex items-start">
                <div class="w-10 h-10 bg-purple-700 text-white flex items-center justify-center rounded-full text-2xl absolute -left-5">
                    <i class="fa-solid fa-search"></i>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-lg w-full">
                    <h3 class="text-xl font-semibold">Find Services</h3>
                    <p class="text-gray-600">Browse and choose the services you need.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="ml-8 flex items-start">
                <div class="w-10 h-10 bg-purple-700 text-white flex items-center justify-center rounded-full text-2xl absolute -left-5">
                    <i class="fa-solid fa-thumbs-up"></i>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-lg w-full">
                    <h3 class="text-xl font-semibold">Get Assistance</h3>
                    <p class="text-gray-600">Book a service and receive help instantly.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Quotes Section -->
<section style="width:100vw; text-align:center; padding:60px 5%; box-sizing:border-box; margin:0;">
        <h2 style="font-size:36px; margin-bottom:20px; color:#222;">What People Say</h2>
        <blockquote style="font-size:22px; font-style:italic; max-width:800px; margin:auto; color:#444;">
            "The best way to find yourself is to lose yourself in the service of others." – Mahatma Gandhi
        </blockquote>
    </section>


    <section
        style="width:100vw; text-align:center; padding:80px 0; background:#f8f8f8; box-sizing:border-box; margin:0;">
        <h2 style="font-size:42px; margin-bottom:40px; color:#222;">Our <span class="text-purple-800">Services</span>
        </h2>
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:30px; padding:0 5%;">
            <?php
        $services = [
            ["icon" => "fa-solid fa-hands-helping", "color" => "#16a34a", "title" => "Volunteer Assistance", "description" => "Connecting volunteers with people in need."],
            ["icon" => "fa-solid fa-map-marker-alt", "color" => "#dc2626", "title" => "Location Tracking", "description" => "Real-time service tracking for better accessibility."],
            ["icon" => "fa-solid fa-credit-card", "color" => "#2563eb", "title" => "Secure Payments", "description" => "Seamless and secure payment options."]
        ];

        foreach ($services as $service) {
            echo "<div class='p-6 shadow-lg rounded-2xl transition-transform transform hover:-translate-y-2 hover:shadow-2xl bg-white'>";
            echo "<div class='flex flex-col items-center text-center space-y-4'>";
            echo '<i class="' . $service["icon"] . ' text-[50px] mb-5" style="color: ' . $service["color"] . ';"></i>';
            echo "<h3 class='text-xl font-semibold text-gray-700'>" . $service['title'] . "</h3>";
            echo "<p class='text-gray-600'>" . $service['description'] . "</p>";
            echo "</div></div>";
        }
    ?>
        </div>


        <div style="margin-top:40px;">
            <a href="services.php"
                style="display:inline-block; padding:15px 30px; background:#673AB7; color:#fff; font-size:18px; border-radius:8px; text-decoration:none; transition:0.3s;">
                See More
            </a>
        </div>
    </section>


    




    <section class="py-20 bg-gray-100">
    <h2 class="text-4xl font-bold text-center text-gray-900 mb-10">Join <span class="text-purple-600">ServiceSpire</span> as a User or Helper</h2>

    <div class="flex flex-col md:flex-row justify-center items-center gap-10 px-10">
        <!-- User Card -->
        <div class="max-w-md w-full p-8 bg-white shadow-lg rounded-lg border border-gray-300 transition-transform transform hover:-translate-y-2 hover:shadow-2xl">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-user text-5xl text-blue-600"></i>
                <h3 class="text-2xl font-semibold">For Users</h3>
            </div>
            <p class="text-gray-600 mt-4">
                Need reliable services? Sign up as a user and find skilled professionals instantly.
            </p>
            <ul class="mt-4 space-y-2 text-gray-700">
                <li>✅ Book trusted service providers</li>
                <li>✅ Pay securely & get assistance</li>
                <li>✅ Track service status in real-time</li>
            </ul>
            <a href="user/login.php" class="mt-5 inline-block bg-blue-600 text-white py-2 px-5 rounded-lg hover:bg-blue-800">Join as User</a>
        </div>

        <!-- Helper Card -->
        <div class="max-w-md w-full p-8 bg-white shadow-lg rounded-lg border border-gray-300 transition-transform transform hover:-translate-y-2 hover:shadow-2xl">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-handshake text-5xl text-green-600"></i>
                <h3 class="text-2xl font-semibold">For Helpers</h3>
            </div>
            <p class="text-gray-600 mt-4">
                Want to earn by helping others? Register as a helper and offer your services.
            </p>
            <ul class="mt-4 space-y-2 text-gray-700">
                <li>✅ Get paid for your skills</li>
                <li>✅ Connect with real clients</li>
                <li>✅ Flexible work schedule</li>
            </ul>
            <a href="helper/login.php" class="mt-5 inline-block bg-green-600 text-white py-2 px-5 rounded-lg hover:bg-green-800">Join as Helper</a>
        </div>
    </div>
</section>




<section class="py-20">
    <h2 class="text-4xl font-bold text-center text-gray-900 mb-10">Frequently Asked Questions</h2>
    <div class="max-w-3xl mx-auto">
        <details class="mb-4 border border-gray-300 p-4 rounded-lg">
            <summary class="font-semibold cursor-pointer">How do I book a service?</summary>
            <p class="text-gray-600 mt-2">Simply sign up, browse services, and click "Book Now."</p>
        </details>
        <details class="mb-4 border border-gray-300 p-4 rounded-lg">
            <summary class="font-semibold cursor-pointer">Is my payment secure?</summary>
            <p class="text-gray-600 mt-2">Yes, we use end-to-end encryption for transactions.</p>
        </details>
    </div>
</section>


<section class="py-20 text-center">
    <h2 class="text-4xl font-bold text-gray-900 mb-4">Join <span class="text-purple-600">ServiceSpire</span> Today!</h2>
    <p class="text-lg text-gray-600 mb-6">Find trusted services with ease.</p>
    <a href="selectrole.php" class="px-6 py-3 bg-purple-600 text-white rounded-lg">Sign Up Now</a>
</section>



    <?php include 'footer.php'; ?>


</body>

</html>