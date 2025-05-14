<?php 
include_once '../components/sidebar.php';
include_once '../config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/logo.png">
</head>
<body>
    <div class="flex flex-col w-full">
            <!-- Top Navbar -->
            <div class="bg-white w-full h-20 shadow-md flex items-center justify-between px-6">
                <div class="text-2xl font-bold text-[#4A628A]">Project Management Dashboard</div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-[#4A628A] hover:text-[#3a4a6a] transition">Profile</a>
                    <a href="/Logistics1/logout.php" class="text-[#4A628A] hover:text-[#3a4a6a] transition">Logout</a>
                </div>
            </div>
        </div>
        <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
