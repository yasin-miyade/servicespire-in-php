<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ServiceSpire</title>
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <?php include 'header.php'; ?>
    
    <div class="max-w-7xl mx-auto py-16 px-6 mt-20">
        <!-- Page Title -->
        <h1 class="text-4xl font-semibold text-center text-gray-900 mb-6">About <span class="text-purple-700">Us</span></h1>
        
        <!-- Vision & Mission Section -->
        <div class="bg-white p-8 rounded-lg shadow-lg mb-10">
            <h2 class="text-2xl font-bold text-purple-600 border-b-2 pb-2">Our Vision & Mission</h2>
            <p class="text-gray-600 mt-4 leading-relaxed">
            Our Vision At Servicespire, we envision a world where no one has
            to face challenges alone. We believe in the power of community and
            the importance of lending a helping hand. Our vision is to create a
            network of support that fosters compassion, collaboration, and
            connection among individuals, ensuring that everyone has access to
            the assistance they need. <br><br>
            Our Mission Our mission is to simplify the process of seeking and
            providing help. We aim to empower users to easily request services
            while enabling helpers to offer their skills and time. By
            facilitating secure transactions and promoting trust, we strive to
            create a seamless experience that benefits both users and helpers.
            We are committed to making a positive impact in our communities by
            connecting those in need with those willing to help.
            </p>
        </div>
        
        <!-- Success Story Section -->
        <div class="bg-white p-8 rounded-lg shadow-lg mb-10">
            <h2 class="text-2xl font-bold text-purple-600 border-b-2 pb-2">Our Success Story</h2>
            <p class="text-gray-600 mt-4 leading-relaxed">
            Our Success Story Since our launch, Servicespire has successfully
            connected thousands of users with dedicated helpers across various
            communities. From delivering essential medications to assisting with
            daily errands, our platform has made a significant difference in the
            lives of many. We take pride in the positive feedback we receive
            from both users and helpers, highlighting the trust and reliability
            that Servicespire fosters. Our success is a testament to the power
            of community and the willingness of individuals to support one
            another.
            </p>
        </div>
        
        <!-- Executive Team Section -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-purple-600 border-b-2 pb-2 text-center">Meet Our Executive Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                <!-- Team Member Card -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center transform transition hover:-translate-y-2 hover:shadow-lg">
                    <img src="assets/images/suraj.jpg" class="w-32 h-32 mx-auto rounded-full border-4 border-purple-500 mb-4">
                    <h3 class="text-xl font-semibold text-purple-700">Suraj</h3>
                    <p class="text-gray-500">Backend Designer</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center transform transition hover:-translate-y-2 hover:shadow-lg">
                    <img src="assets/images/omkar.jpg" class="w-32 h-32 mx-auto rounded-full border-4 border-purple-500 mb-4">
                    <h3 class="text-xl font-semibold text-purple-700">Omkar</h3>
                    <p class="text-gray-500">Backend Designer</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center transform transition hover:-translate-y-2 hover:shadow-lg">
                    <img src="assets/images/yasin.jpg" class="w-32 h-32 mx-auto rounded-full border-4 border-purple-500 mb-4">
                    <h3 class="text-xl font-semibold text-purple-700">Yasin</h3>
                    <p class="text-gray-500">Front-End Designer</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-md text-center transform transition hover:-translate-y-2 hover:shadow-lg">
                    <img src="assets/images/Arya.jpg" class="w-32 h-32 mx-auto rounded-full border-4 border-purple-500 mb-4">
                    <h3 class="text-xl font-semibold text-purple-700">Arya</h3>
                    <p class="text-gray-500">Full Stack Developer</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>