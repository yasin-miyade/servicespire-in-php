<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceSpire Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/all.min.css">
</head>
<body class="bg-gray-100 font-inter">

    <div class="flex h-screen">
        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h2 class="text-3xl font-semibold mb-4">Dashboard</h2>
            <p class="text-gray-600 mb-6">Overview of recent activities and statistics.</p>
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="p-6 bg-blue-100 border-l-4 border-blue-500 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">Total Requests</h3>
                    <p class="text-3xl font-semibold">120</p>
                </div>
                <div class="p-6 bg-green-100 border-l-4 border-green-500 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">Completed</h3>
                    <p class="text-3xl font-semibold">30</p>
                </div>
                <div class="p-6 bg-yellow-100 border-l-4 border-yellow-500 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">Pending Approvals</h3>
                    <p class="text-3xl font-semibold">15</p>
                </div>
            </div>
            
            <!-- Charts and Graphs -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4">Requests Trend</h2>
                <div class="h-64 bg-gray-100 rounded-lg shadow-md p-4 flex items-center justify-center">
                    <p class="text-gray-400">Chart Placeholder </p>
                </div>
            </div>
            hiiii
        </div>
    </div>
</body>
</html>