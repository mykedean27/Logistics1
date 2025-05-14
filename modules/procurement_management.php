<?php
include '../config.php';
include '../module_functions/procurement_management/procurement_function.php';
include '../components/sidebar.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add Procurement
    if (isset($_POST['add_procurement'])) {
        $date = $_POST['procurement_date'];
        $total = $_POST['total_amount'];
        $status = $_POST['status'];
        $supplier_id = $_POST['supplier_id'];
        if (addProcurement($conn, $date, $total, $status, $supplier_id)) {
            $success_message = "Procurement added successfully!";
        } else {
            $error_message = "Error adding procurement: " . $conn->error;
        }
    }
    // Add Procurement Item
    if (isset($_POST['add_procurement_item'])) {
        $procurement_id = $_POST['procurement_id'];
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];
        $unit_price = $_POST['unit_price'];
        if (addProcurementItem($conn, $procurement_id, $item_name, $quantity, $unit_price)) {
            $success_message = "Procurement item added successfully!";
        } else {
            $error_message = "Error adding procurement item: " . $conn->error;
        }
    }
    // Add Supplier
    if (isset($_POST['add_supplier'])) {
        $name = $_POST['supplier_name'];
        $contact = $_POST['contact_info'];
        $rating = $_POST['rating'];
        if (addSupplier($conn, $name, $contact, $rating)) {
            $success_message = "Supplier added successfully!";
        } else {
            $error_message = "Error adding supplier: " . $conn->error;
        }
    }
    // Add Warehouse
    if (isset($_POST['add_warehouse'])) {
        $location = $_POST['location'];
        $capacity = $_POST['capacity'];
        if (addWarehouse($conn, $location, $capacity)) {
            $success_message = "Warehouse added successfully!";
        } else {
            $error_message = "Error adding warehouse: " . $conn->error;
        }
    }
    // Edit and update logic for each entity (similar to add, using edit functions)
    // ... (implement as needed)
}

// Handle delete actions
if (isset($_GET['delete_procurement'])) {
    $id = $_GET['delete_procurement'];
    if (deleteProcurement($conn, $id)) {
        $success_message = "Procurement deleted successfully!";
    } else {
        $error_message = "Error deleting procurement: " . $conn->error;
    }
}
if (isset($_GET['delete_procurement_item'])) {
    $id = $_GET['delete_procurement_item'];
    if (deleteProcurementItem($conn, $id)) {
        $success_message = "Procurement item deleted successfully!";
    } else {
        $error_message = "Error deleting procurement item: " . $conn->error;
    }
}
if (isset($_GET['delete_supplier'])) {
    $id = $_GET['delete_supplier'];
    if (deleteSupplier($conn, $id)) {
        $success_message = "Supplier deleted successfully!";
    } else {
        $error_message = "Error deleting supplier: " . $conn->error;
    }
}
if (isset($_GET['delete_warehouse'])) {
    $id = $_GET['delete_warehouse'];
    if (deleteWarehouse($conn, $id)) {
        $success_message = "Warehouse deleted successfully!";
    } else {
        $error_message = "Error deleting warehouse: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Procurement Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../img/logo.png">
</head>
<body class="bg-gray-100">
    <div class="flex flex-col w-full">
        <div class="bg-white w-full h-20 shadow-md flex items-center justify-between px-6">
            <div class="text-2xl font-bold text-[#4A628A]">Procurement Management Dashboard</div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-[#4A628A] hover:text-[#3a4a6a] transition">Profile</a>
                <a href="/Logistics1/logout.php" class="text-[#4A628A] hover:text-[#3a4a6a] transition">Logout</a>
            </div>
        </div>
        <div class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                <?php if (isset($success_message)): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <span class="block sm:inline"><?php echo $success_message; ?></span>
                    </div>
                <?php endif; ?>
                <?php if (isset($error_message)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <span class="block sm:inline"><?php echo $error_message; ?></span>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Procurement Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Procurements</h2>
                        <p class="text-gray-600 mb-4">Manage procurements, track status, and suppliers.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddProcurementModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Procurement
                            </button>
                            <button onclick="openViewProcurementModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Procurements
                            </button>
                        </div>
                    </div>
                    <!-- Procurement Item Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Procurement Items</h2>
                        <p class="text-gray-600 mb-4">Manage items for each procurement.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddProcurementItemModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Item
                            </button>
                            <button onclick="openViewProcurementItemModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Items
                            </button>
                        </div>
                    </div>
                    <!-- Supplier Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Suppliers</h2>
                        <p class="text-gray-600 mb-4">Manage suppliers and their ratings.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddSupplierModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Supplier
                            </button>
                            <button onclick="openViewSupplierModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Suppliers
                            </button>
                        </div>
                    </div>
                    <!-- Warehouse Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Warehouses</h2>
                        <p class="text-gray-600 mb-4">Manage warehouse locations and capacity.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddWarehouseModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Warehouse
                            </button>
                            <button onclick="openViewWarehouseModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Warehouses
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Recent Activity</h2>
                    <div class="space-y-4">
                        <?php
                        function getRecentActivity($conn, $limit = 5) {
                            $activities = [];
                            // Recent Procurements
                            $sql = "SELECT procurement_id, procurement_date, status FROM procurement ORDER BY procurement_date DESC LIMIT $limit";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $activities[] = [
                                        'type' => 'procurement',
                                        'message' => 'Procurement #' . $row['procurement_id'] . ' created (Status: ' . htmlspecialchars($row['status']) . ')',
                                        'time' => $row['procurement_date'],
                                    ];
                                }
                            }
                            // Recent Items
                            $sql = "SELECT item_id, item_name, procurement_id FROM procurement_item ORDER BY item_id DESC LIMIT $limit";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $activities[] = [
                                        'type' => 'item',
                                        'message' => 'Item "' . htmlspecialchars($row['item_name']) . '" added to Procurement #' . $row['procurement_id'],
                                        'time' => date('Y-m-d H:i:s'), // No date in table, so use now
                                    ];
                                }
                            }
                            // Recent Suppliers
                            $sql = "SELECT supplier_id, supplier_name FROM supplies ORDER BY supplier_id DESC LIMIT $limit";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $activities[] = [
                                        'type' => 'supplier',
                                        'message' => 'Supplier "' . htmlspecialchars($row['supplier_name']) . '" added',
                                        'time' => date('Y-m-d H:i:s'),
                                    ];
                                }
                            }
                            // Recent Warehouses
                            $sql = "SELECT warehouse_id, location FROM warehouse ORDER BY warehouse_id DESC LIMIT $limit";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $activities[] = [
                                        'type' => 'warehouse',
                                        'message' => 'Warehouse at "' . htmlspecialchars($row['location']) . '" added',
                                        'time' => date('Y-m-d H:i:s'),
                                    ];
                                }
                            }
                            usort($activities, function ($a, $b) {
                                return strtotime($b['time']) - strtotime($a['time']);
                            });
                            return array_slice($activities, 0, $limit);
                        }
                        function timeAgo($datetime) {
                            $timestamp = strtotime($datetime);
                            $diff = time() - $timestamp;
                            if ($diff < 60) return $diff . " seconds ago";
                            $diff = round($diff / 60);
                            if ($diff < 60) return $diff . " minutes ago";
                            $diff = round($diff / 60);
                            if ($diff < 24) return $diff . " hours ago";
                            $diff = round($diff / 24);
                            if ($diff < 7) return $diff . " days ago";
                            return date("M d, Y", $timestamp);
                        }
                        $recentActivities = getRecentActivity($conn, 5);
                        if (empty($recentActivities)):
                        ?>
                            <div class="text-gray-500">No recent activity.</div>
                        <?php else:
                            foreach ($recentActivities as $activity):
                                if ($activity['type'] === 'procurement') {
                                    $icon = 'shopping_cart';
                                    $iconColor = 'text-blue-500';
                                    $bgColor = 'bg-blue-100';
                                } elseif ($activity['type'] === 'item') {
                                    $icon = 'inventory_2';
                                    $iconColor = 'text-green-500';
                                    $bgColor = 'bg-green-100';
                                } elseif ($activity['type'] === 'supplier') {
                                    $icon = 'local_shipping';
                                    $iconColor = 'text-yellow-500';
                                    $bgColor = 'bg-yellow-100';
                                } elseif ($activity['type'] === 'warehouse') {
                                    $icon = 'store';
                                    $iconColor = 'text-purple-500';
                                    $bgColor = 'bg-purple-100';
                                } else {
                                    $icon = 'info';
                                    $iconColor = 'text-gray-500';
                                    $bgColor = 'bg-gray-100';
                                }
                        ?>
                            <div class="flex items-start">
                                <div class="<?php echo $bgColor; ?> p-2 rounded-full mr-3">
                                    <span class="material-icons <?php echo $iconColor; ?>"><?php echo $icon; ?></span>
                                </div>
                                <div>
                                    <p class="font-medium"><?php echo $activity['message']; ?></p>
                                    <p class="text-sm text-gray-500"><?php echo timeAgo($activity['time']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <?php include '../modules/procurement_management/procurement_modal/add_procurement.php'; ?>
    <?php include '../modules/procurement_management/procurement_modal/view_procurement.php'; ?>
    <?php include '../modules/procurement_management/procurement_modal/edit_procurement.php'; ?>
    <?php include '../modules/procurement_management/procurement_modal/add_procurement_item.php'; ?>
    <?php include '../modules/procurement_management/procurement_modal/view_procurement_item.php'; ?>
    <?php include '../modules/procurement_management/procurement_modal/edit_procurement_item.php'; ?>
    <?php include '../modules/procurement_management/supplier_modal/add_supplier.php'; ?>
    <?php include '../modules/procurement_management/supplier_modal/view_supplier.php'; ?>
    <?php include '../modules/procurement_management/supplier_modal/edit_supplier.php'; ?>
    <?php include '../modules/procurement_management/warehouse_modal/add_warehouse.php'; ?>
    <?php include '../modules/procurement_management/warehouse_modal/view_warehouse.php'; ?>
    <?php include '../modules/procurement_management/warehouse_modal/edit_warehouse.php'; ?>
    <script src="../js//procurement_management.js"></script>
</body>
</html>

