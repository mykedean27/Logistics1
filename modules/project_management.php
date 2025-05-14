<?php
include '../config.php';
include '../module_functions/project_management/project_function.php';
include '../components/sidebar.php';
?>
<?php
// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_project'])) {
        $name = $_POST['project_name'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $status = $_POST['status'];

        if (addProject($conn, $name, $startDate, $endDate, $status)) {
            $success_message = "Project added successfully!";
        } else {
            $error_message = "Error adding project: " . $conn->error;
        }
    }

    if (isset($_POST['add_task'])) {
        $name = $_POST['task_name'];
        $projectId = $_POST['project_id'];
        $startDate = $_POST['task_start_date'];
        $endDate = $_POST['task_end_date'];
        $status = $_POST['task_status'];

        if (addTask($conn, $name, $projectId, $startDate, $endDate, $status)) {
            $success_message = "Task added successfully!";
        } else {
            $error_message = "Error adding task: " . $conn->error;
        }
    }

    if (isset($_POST['add_employee'])) {
        $name = $_POST['employee_name'];
        $role = $_POST['role'];
        $department = $_POST['department'];
        $contact = $_POST['contact'];

        if (addEmployee($conn, $name, $role, $department, $contact)) {
            $success_message = "Employee added successfully!";
        } else {
            $error_message = "Error adding employee: " . $conn->error;
        }
    }

    if (isset($_POST['add_resource'])) {
        $name = $_POST['resource_name'];
        $type = $_POST['resource_type'];
        $availability = $_POST['availability'];
        $quantity = $_POST['quantity'];
        $projectId = $_POST['resource_project_id'];

        if (addResource($conn, $name, $type, $availability, $quantity, $projectId)) {
            $success_message = "Resource added successfully!";
        } else {
            $error_message = "Error adding resource: " . $conn->error;
        }
    }

    if (isset($_POST['add_risk'])) {
        $description = $_POST['risk_description'];
        $projectId = $_POST['risk_project_id'];
        $probability = $_POST['probability'];
        $impact = $_POST['impact'];
        $mitigation = $_POST['mitigation'];

        if (addRisk($conn, $description, $projectId, $probability, $impact, $mitigation)) {
            $success_message = "Risk added successfully!";
        } else {
            $error_message = "Error adding risk: " . $conn->error;
        }
    }

    if (isset($_POST['add_progress_report'])) {
        $projectId = $_POST['report_project_id'];
        $submissionDate = $_POST['submission_date'];
        $status = $_POST['report_status'];
        $details = $_POST['details'];

        if (addProgressReport($conn, $projectId, $submissionDate, $status, $details)) {
            $success_message = "Progress report added successfully!";
        } else {
            $error_message = "Error adding progress report: " . $conn->error;
        }
    }
}
// Handle edit submissions
if (isset($_POST['edit_project'])) {
    $id = $_POST['project_id'];
    $name = $_POST['project_name'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $status = $_POST['status'];

    if (editProject($conn, $id, $name, $startDate, $endDate, $status)) {
        $success_message = "Project updated successfully!";
    } else {
        $error_message = "Error updating project: " . $conn->error;
    }
}

if (isset($_POST['edit_task'])) {
    $id = $_POST['task_id'];
    $name = $_POST['task_name'];
    $projectId = $_POST['project_id'];
    $startDate = $_POST['task_start_date'];
    $endDate = $_POST['task_end_date'];
    $status = $_POST['task_status'];

    if (editTask($conn, $id, $name, $projectId, $startDate, $endDate, $status)) {
        $success_message = "Task updated successfully!";
    } else {
        $error_message = "Error updating task: " . $conn->error;
    }
}

if (isset($_POST['edit_employee'])) {
    $id = $_POST['employee_id'];
    $name = $_POST['employee_name'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];

    if (editEmployee($conn, $id, $name, $role, $department, $contact)) {
        $success_message = "Employee updated successfully!";
    } else {
        $error_message = "Error updating employee: " . $conn->error;
    }
}

if (isset($_POST['edit_resource'])) {
    $id = $_POST['resource_id'];
    $name = $_POST['resource_name'];
    $type = $_POST['resource_type'];
    $availability = $_POST['availability'];
    $quantity = $_POST['quantity'];
    $projectId = $_POST['resource_project_id'];

    if (editResource($conn, $id, $name, $type, $availability, $quantity, $projectId)) {
        $success_message = "Resource updated successfully!";
    } else {
        $error_message = "Error updating resource: " . $conn->error;
    }
}

if (isset($_POST['edit_risk'])) {
    $id = $_POST['risk_id'];
    $description = $_POST['risk_description'];
    $projectId = $_POST['risk_project_id'];
    $probability = $_POST['probability'];
    $impact = $_POST['impact'];
    $mitigation = $_POST['mitigation'];

    if (editRisk($conn, $id, $description, $projectId, $probability, $impact, $mitigation)) {
        $success_message = "Risk updated successfully!";
    } else {
        $error_message = "Error updating risk: " . $conn->error;
    }
}

if (isset($_POST['edit_progress_report'])) {
    $id = $_POST['report_id'];
    $projectId = $_POST['report_project_id'];
    $submissionDate = $_POST['submission_date'];
    $status = $_POST['report_status'];
    $details = $_POST['details'];

    if (editProgressReport($conn, $id, $projectId, $submissionDate, $status, $details)) {
        $success_message = "Progress report updated successfully!";
    } else {
        $error_message = "Error updating progress report: " . $conn->error;
    }
}

// Handle delete actions
if (isset($_GET['delete_project'])) {
    $id = $_GET['delete_project'];
    if (deleteProject($conn, $id)) {
        $success_message = "Project deleted successfully!";
    } else {
        $error_message = "Error deleting project: " . $conn->error;
    }
}

if (isset($_GET['delete_task'])) {
    $id = $_GET['delete_task'];
    if (deleteTask($conn, $id)) {
        $success_message = "Task deleted successfully!";
    } else {
        $error_message = "Error deleting task: " . $conn->error;
    }
}

if (isset($_GET['delete_employee'])) {
    $id = $_GET['delete_employee'];
    if (deleteEmployee($conn, $id)) {
        $success_message = "Employee deleted successfully!";
    } else {
        $error_message = "Error deleting employee: " . $conn->error;
    }
}

if (isset($_GET['delete_resource'])) {
    $id = $_GET['delete_resource'];
    if (deleteResource($conn, $id)) {
        $success_message = "Resource deleted successfully!";
    } else {
        $error_message = "Error deleting resource: {$conn->error}";
    }
}

if (isset($_GET['delete_risk'])) {
    $id = $_GET['delete_risk'];
    if (deleteRisk($conn, $id)) {
        $success_message = "Risk deleted successfully!";
    } else {
        $error_message = "Error deleting risk: " . $conn->error;
    }
}

if (isset($_GET['delete_progress_report'])) {
    $id = $_GET['delete_progress_report'];
    if (deleteProgressReport($conn, $id)) {
        $success_message = "Progress report deleted successfully!";
    } else {
        $error_message = "Error deleting progress report: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../img/logo.png">
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex flex-col w-full">
        <!-- Top Navbar -->
        <div class="bg-white w-full h-20 shadow-md flex items-center justify-between px-6">
            <div class="text-2xl font-bold text-[#4A628A]">Project Management Dashboard</div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-[#4A628A] hover:text-[#3a4a6a] transition">Profile</a>
                <a href="/Logistics1/logout.php" class="text-[#4A628A] hover:text-[#3a4a6a] transition">Logout</a>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                <!-- Success/Error Messages -->
                <?php if (isset($success_message)): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <span class="block sm:inline"><?php echo $success_message; ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (isset($error_message)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <span class="block sm:inline"><?php echo $error_message; ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                <?php endif; ?>



                <!-- Project Management Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Projects Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Projects</h2>
                        <p class="text-gray-600 mb-4">Manage your projects, track progress, and monitor deadlines.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddProjectModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Project
                            </button>
                            <button onclick="openViewProjectsModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Projects
                            </button>
                        </div>
                    </div>

                    <!-- Tasks Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Tasks</h2>
                        <p class="text-gray-600 mb-4">Create and assign tasks to team members for each project.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddTaskModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Task
                            </button>
                            <button onclick="openViewTaskModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Tasks
                            </button>
                        </div>
                    </div>

                    <!-- Employees Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Employees</h2>
                        <p class="text-gray-600 mb-4">Manage team members and their roles in projects.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddEmployeeModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Employee
                            </button>
                            <button onclick="openViewEmployeeModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Employees
                            </button>
                        </div>
                    </div>

                    <!-- Resources Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Resources</h2>
                        <p class="text-gray-600 mb-4">Track and allocate resources for your projects.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddResourceModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Resource
                            </button>
                            <button onclick="openViewResourceModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Resources
                            </button>
                        </div>
                    </div>

                    <!-- Risks Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Risks</h2>
                        <p class="text-gray-600 mb-4">Identify and manage potential risks in your projects.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddRiskModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Risk
                            </button>
                            <button onclick="openViewRiskModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Risks
                            </button>
                        </div>
                    </div>

                    <!-- Progress Reports Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Progress Reports</h2>
                        <p class="text-gray-600 mb-4">Create and review progress reports for projects.</p>
                        <div class="flex space-x-3">
                            <button onclick="openAddProgressModal()" class="bg-[#4A628A] hover:bg-[#3a4a6a] text-white px-4 py-2 rounded transition">
                                Add Report
                            </button>
                            <button onclick="openViewProgressModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                                View Reports
                            </button>
                        </div>
                    </div>
                </div>

                <!------------------------------------------------------------Recent Activity Section-------------------------------------------------------------------->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-xl font-semibold mb-4 text-[#4A628A]">Recent Activity</h2>
                    <div class="space-y-4">
                        <?php
                        // Helper function to get recent activity
                        function getRecentActivity($conn, $limit = 5) {
                            $activities = [];

                            // Recent Projects
                            $sql = "SELECT id, name, created_at FROM projects ORDER BY created_at DESC LIMIT $limit";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $activities[] = [
                                        'type' => 'project',
                                        'message' => 'New project "' . htmlspecialchars($row['name']) . '" created',
                                        'time' => $row['created_at'],
                                    ];
                                }
                            }

                            // Recent Tasks
                            $sql = "SELECT id, name, status, updated_at FROM tasks WHERE status='Completed' ORDER BY updated_at DESC LIMIT $limit";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $activities[] = [
                                        'type' => 'task',
                                        'message' => 'Task "' . htmlspecialchars($row['name']) . '" completed',
                                        'time' => $row['updated_at'],
                                    ];
                                }
                            }

                            // Recent Risks
                            $sql = "SELECT id, description, created_at FROM risks ORDER BY created_at DESC LIMIT $limit";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $activities[] = [
                                        'type' => 'risk',
                                        'message' => 'New risk identified: "' . htmlspecialchars(substr($row['description'], 0, 40)) . '"',
                                        'time' => $row['created_at'],
                                    ];
                                }
                            }

                            // Sort all activities by time descending
                            usort($activities, function($a, $b) {
                                return strtotime($b['time']) - strtotime($a['time']);
                            });

                            // Limit to $limit items
                            return array_slice($activities, 0, $limit);
                        }

                        // Helper to format time ago
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
                        <?php
                        else:
                            foreach ($recentActivities as $activity):
                                if ($activity['type'] === 'project') {
                                    $icon = 'assignment';
                                    $iconColor = 'text-blue-500';
                                    $bgColor = 'bg-blue-100';
                                } elseif ($activity['type'] === 'task') {
                                    $icon = 'task';
                                    $iconColor = 'text-green-500';
                                    $bgColor = 'bg-green-100';
                                } elseif ($activity['type'] === 'risk') {
                                    $icon = 'warning';
                                    $iconColor = 'text-yellow-500';
                                    $bgColor = 'bg-yellow-100';
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
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----------------------------------------------Modals------------------------------------>
    <!-- PROJECT MODAL -->
    <!-- Add Project Modal -->
    <?php include'../modules/project_management/project_modal/add_project.php'; ?>
    <!-- View Projects Modal -->
    <?php include'../modules/project_management/project_modal/view_project.php'; ?>
    <!-- Edit Project Modal -->
    <?php include'../modules/project_management/project_modal/edit_project.php'; ?>
    <!-- TASK MODAL -->
    <!-- Add Task Modal -->
    <?php
    // Include other necessary files
    include '../modules/project_management/task_modal/add_task.php';
    include '../modules/project_management/task_modal/view_task.php';
    include '../modules/project_management/task_modal/edit_task.php';
?>
    <!-- EMPLOYEE MODAL -->
    <!-- Add Employee Modal -->
    <?php include'../modules/project_management/employee_modal/add_employee.php'; ?>
    <!-- View Employees Modal -->
    <?php include'../modules/project_management/employee_modal/view_employee.php'; ?>
    <!-- Edit Employee Modal -->
    <?php include'../modules/project_management/employee_modal/edit_employee.php'; ?>
    <!-- RESOURCE MODAL -->
    <!-- Add Resource Modal -->
    <?php include'../modules/project_management/resource_modal/add_resource.php'; ?>
    <!-- View Resources Modal -->
    <?php include'../modules/project_management/resource_modal/view_resource.php'; ?>
    <!-- Edit Resource Modal -->
    <?php include'../modules/project_management/resource_modal/edit_resource.php'; ?>
    <!-- RISK MODAL -->
    <!-- Add Risk Modal -->
    <?php include'../modules/project_management/risk_modal/add_risk.php'; ?>
    <!-- View Risks Modal -->
    <?php include'../modules/project_management/risk_modal/view_risk.php'; ?>
    <!-- Edit Risk Modal -->
    <?php include'../modules/project_management/risk_modal/edit_risk.php'; ?>
    
    <!-- PROGRESS REPORT MODAL -->
    <!-- Add Progress Report Modal -->
     <?php include'../modules/project_management/progress_report_modal/add_progress_report.php'; ?>
    <!-- View Progress Reports Modal -->
    <?php include'../modules/project_management/progress_report_modal/view_progress_report.php'; ?>
    <!-- Edit Progress Report Modal -->
    <?php include'../modules/project_management/progress_report_modal/edit_progress_report.php'; ?>
    <script src="../js/project_management.js"></script>
</body>

</html>