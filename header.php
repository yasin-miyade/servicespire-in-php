<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceSpire</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            if (window.scrollY > 50) {
                header.classList.add("bg-white", "shadow-md");
            } else {
                header.classList.remove("bg-white", "shadow-md");
            }
        });
    </script>
</head>
<body>
    <header class="fixed top-0 w-full z-50 text-xl transition-all duration-300">
        <nav class="border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="index.php" class="flex items-center">
                    <h3 class="text-purple-800 md:font-bold text-3xl ml-3">ServiceSpire</h3>
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="../midui/selectrole.php" class="text-white bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">Get Started</a>
                </div>
                <div class="hidden lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li><a href="index.php" class="block py-2 px-3 hover:text-purple-800">Home</a></li>
                        <li><a href="about.php" class="block py-2 px-3 hover:text-purple-800">About Us</a></li>
                        <li><a href="contact.php" class="block py-2 px-3 hover:text-purple-800">Contact Us</a></li>
                        <li><a href="services.php" class="block py-2 px-3 hover:text-purple-800">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.getElementById("header");

            // Add background and shadow on scroll
            window.addEventListener("scroll", function () {
                if (window.scrollY > 50) {
                    header.classList.add("bg-white", "shadow-lg", "mx-[]", "rounded-2xl");
                } else {
                    header.classList.remove("bg-white", "shadow-lg", "mx-[0%]", "rounded-2xl");
                }
            });

            // Highlight the active page
            const currentPath = window.location.pathname.split("/").pop(); // Get only the file name
            document.querySelectorAll(".nav-link").forEach(link => {
                if (link.getAttribute("href").endsWith(currentPath)) {
                    link.classList.add("border-b-2", "border-purple-600", "text-purple-700", "font-semibold");
                }
            });
        });
    </script>
</head>
<body class="bg-gray-100">
    <header id="header" class="fixed top-2 w-max left-40 transition-all duration-300 z-50 h-20"> 
        <nav class="border-gray-200 px-4 lg:px-6 py-4">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="index.php" class="flex items-center">
                    <h3 class="text-purple-800 md:font-bold text-3xl ml-3 mr-56"><img src="assets/images/logo1.jpg" alt="" class="w-44 "></h3>
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="selectrole.php" class="text-white bg-purple-600 hover:bg-purple-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none ml-40">
                        Get Started
                    </a>
                </div>
                <div class="hidden justify-between items-center text-xl w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-4 lg:mt-0">
                        <li><a href="index.php" class="nav-link block p-2  text-black hover:text-purple-600">Home</a></li>
                        <li><a href="about.php" class="nav-link block p-2  text-black hover:text-purple-600">About Us</a></li>
                        <li><a href="contact_us.php" class="nav-link block p-2  text-black hover:text-purple-600">Contact Us</a></li>
                        <li><a href="services.php" class="nav-link block p-2  text-black hover:text-purple-600">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>
