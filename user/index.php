<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-inter">
    <div class="flex h-screen">

        <div id="sidebar"
            class="w-64 bg-white shadow-lg p-5 fixed top-0 left-0 h-screen z-10 transition-all duration-300">
            <div class="flex justify-between items-center mb-6">
                <h1 id="logo-text" class="text-2xl font-bold text-blue-500 transition-all"><img
                        src="../assets/images/logo1.jpg" alt="" class="w-40 "></h1>
                <button onclick="toggleSidebar()" class="text-black text-2xl ml-4 focus:outline-none">☰</button>
            </div>
            <nav>
                <ul>
                    <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
                    $menuItems = [
                        "dashboard" => ["Dashboard", "fa-house"],
                        "post_form" => ["Posts", "fa-briefcase"],
                        "notifaction" => ["Notifaction", "fa-bell"],
                        "profile" => ["User Profile", "fa-user"]
                    ];
                    
                    foreach ($menuItems as $key => $value) {
                        $activeClass = ($page === $key) ? "bg-purple-600 text-white" : "bg-gray-100 text-gray-600 hover:bg-gray-200";
                        echo "<li class='mb-2'>
                                <a href='?page=$key' class='flex items-center p-4 min-h-[50px] rounded-lg $activeClass'>
                                    <i class='fa-solid {$value[1]} fa-lg pr-1 ml-1 '></i>
                                    <span class='sidebar-text'>{$value[0]}</span>
                                </a>
                              </li>";
                    }
                    ?>

                    <li class="mb-2">
                        <a href="logout.php"
                            class="flex items-center p-4 rounded-lg min-h-[50px] bg-red-500 text-white hover:bg-red-600">
                            <i class="fa-solid fa-sign-out-alt fa-lg mr-1"></i>
                            <span class="sidebar-text">Logout</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
        <div id="main-content" class="flex-1 p-6 ml-64 transition-all duration-300">
            <?php 
                $file = "$page.php";
                if (file_exists($file)) {
                    include $file;
                } else {
                    echo "<h2 class='text-3xl font-semibold'>Page Not Found</h2>";
                }
            ?>
        </div>
    </div>


    <script>
    function toggleSidebar() {
        let sidebar = document.getElementById("sidebar");
        let mainContent = document.getElementById("main-content");
        let texts = document.querySelectorAll(".sidebar-text");
        let logoText = document.getElementById("logo-text");

        sidebar.classList.toggle("w-64");
        sidebar.classList.toggle("w-22");
        mainContent.classList.toggle("ml-64");
        mainContent.classList.toggle("ml-20");

        texts.forEach(text => text.classList.toggle("hidden"));
        logoText.classList.toggle("hidden");
    }
    </script>
</body>

</html>