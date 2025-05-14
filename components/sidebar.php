<?php 
include_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/logo.png">
</head>
<body>
    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <aside class="bg-[#4A628A] w-full lg:w-80 min-h-screen text-white flex flex-col">
            <div class="flex items-center justify-start h-20 border-b border-[#3a4a6a]">
                <img src="../img/logo.png" alt="Logo" class="h-20 w-20">
                <span class="font-bold text-2xl">Logistics 1</span>
            </div>
            <nav class="flex-1 px-4 py-6">
                <ul class="space-y-4">
                    <li>
                        <a href="../dashboard.php" class="flex items-center hover:bg-[#3a4a6a] px-3 py-2 rounded transition">
                            <span class="material-icons mr-2">dashboard</span>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="../modules/project_management.php" class="flex items-center hover:bg-[#3a4a6a] px-3 py-2 rounded transition">
                            <span class="material-icons mr-2 ">home</span>
                            Project Management
                        </a>
                    </li>
                    <li>
                        <a href="../modules/procurement_management.php" class="flex items-center hover:bg-[#3a4a6a] px-3 py-2 rounded transition">
                            <span class="material-icons mr-2">shopping_cart</span>
                            Procurement Management
                        </a>
                    </li>
                    <li>
                        <a href="../modules/asset_management.php" class="flex items-center hover:bg-[#3a4a6a] px-3 py-2 rounded transition">
                            <span class="material-icons mr-2">inventory</span>
                            Asset Management
                        </a>
                    </li>
                    <li>
                        <a href="../modules/warehouse_management.php" class="flex items-center hover:bg-[#3a4a6a] px-3 py-2 rounded transition">
                            <span class="material-icons mr-2">warehouse</span>
                            Warehouse Management
                        </a>
                    </li>
                    <li>
                        <a href="../modules/mro_management.php" class="flex items-center hover:bg-[#3a4a6a] px-3 py-2 rounded transition">
                            <span class="material-icons mr-2">build</span>
                            Mro Management
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="px-4 py-4 border-t border-[#3a4a6a]">
                <a href="/Logistics1/logout.php" class="flex items-center hover:bg-[#3a4a6a] px-3 py-2 rounded transition">
                    <span class="material-icons mr-2">logout</span>
                    Logout
                </a>
            </div>
        </aside>
        <!-- end of sidebar -->

        <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>