<?php
// Function implementations (same as before)
function getAllProjects($conn) {
    $query = "SELECT * FROM projects";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function addProject($conn, $name, $startDate, $endDate, $status) {
    $query = "INSERT INTO projects (name, start_date, end_date, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $name, $startDate, $endDate, $status);
    return $stmt->execute();
}

function getAllTasks($conn) {
    $query = "SELECT t.*, p.name as project_name FROM tasks t JOIN projects p ON t.project_id = p.id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function addTask($conn, $name, $projectId, $startDate, $endDate, $status) {
    $query = "INSERT INTO tasks (name, project_id, start_date, end_date, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sisss", $name, $projectId, $startDate, $endDate, $status);
    return $stmt->execute();
}

function getAllEmployees($conn) {
    $query = "SELECT * FROM employees";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function addEmployee($conn, $name, $role, $department, $contact) {
    $query = "INSERT INTO employees (name, role, department, contact) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $name, $role, $department, $contact);
    return $stmt->execute();
}

function getAllResources($conn) {
    $query = "SELECT r.*, p.name as project_name FROM resources r LEFT JOIN projects p ON r.project_id = p.id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function addResource($conn, $name, $type, $availability, $quantity, $projectId) {
    $query = "INSERT INTO resources (name, type, availability, quantity, project_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssii", $name, $type, $availability, $quantity, $projectId);
    return $stmt->execute();
}

function getAllRisks($conn) {
    $query = "SELECT r.*, p.name as project_name FROM risks r JOIN projects p ON r.project_id = p.id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function addRisk($conn, $description, $projectId, $probability, $impact, $mitigation) {
    $query = "INSERT INTO risks (description, project_id, probability, impact, mitigation) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sisss", $description, $projectId, $probability, $impact, $mitigation);
    return $stmt->execute();
}

function getAllProgressReports($conn) {
    $query = "SELECT pr.*, p.name as project_name FROM progress_reports pr JOIN projects p ON pr.project_id = p.id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function addProgressReport($conn, $projectId, $submissionDate, $status, $details) {
    $query = "INSERT INTO progress_reports (project_id, submission_date, status, details) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isss", $projectId, $submissionDate, $status, $details);
    return $stmt->execute();
}
//EDIT AND DELETE FUNCTIONS
// Edit functions
function editProject($conn, $id, $name, $startDate, $endDate, $status) {
    $stmt = $conn->prepare("UPDATE projects SET name=?, start_date=?, end_date=?, status=? WHERE id=?");
    return $stmt->execute([$name, $startDate, $endDate, $status, $id]);
}

function editTask($conn, $id, $name, $projectId, $startDate, $endDate, $status) {
    $stmt = $conn->prepare("UPDATE tasks SET name=?, project_id=?, start_date=?, end_date=?, status=? WHERE id=?");
    return $stmt->execute([$name, $projectId, $startDate, $endDate, $status, $id]);
}

function editEmployee($conn, $id, $name, $role, $department, $contact) {
    $stmt = $conn->prepare("UPDATE employees SET name=?, role=?, department=?, contact=? WHERE id=?");
    return $stmt->execute([$name, $role, $department, $contact, $id]);
}

function editResource($conn, $id, $name, $type, $availability, $quantity, $projectId) {
    $stmt = $conn->prepare("UPDATE resources SET name=?, type=?, availability=?, quantity=?, project_id=? WHERE id=?");
    return $stmt->execute([$name, $type, $availability, $quantity, $projectId, $id]);
}

function editRisk($conn, $id, $description, $projectId, $probability, $impact, $mitigation) {
    $stmt = $conn->prepare("UPDATE risks SET description=?, project_id=?, probability=?, impact=?, mitigation=? WHERE id=?");
    return $stmt->execute([$description, $projectId, $probability, $impact, $mitigation, $id]);
}

function editProgressReport($conn, $id, $projectId, $submissionDate, $status, $details) {
    $stmt = $conn->prepare("UPDATE progress_reports SET project_id=?, submission_date=?, status=?, details=? WHERE id=?");
    return $stmt->execute([$projectId, $submissionDate, $status, $details, $id]);
}

// Delete functions
function deleteProject($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM projects WHERE id=?");
    return $stmt->execute([$id]);
}

function deleteTask($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id=?");
    return $stmt->execute([$id]);
}

function deleteEmployee($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM employees WHERE id=?");
    return $stmt->execute([$id]);
}

function deleteResource($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM resources WHERE id=?");
    return $stmt->execute([$id]);
}

function deleteRisk($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM risks WHERE id=?");
    return $stmt->execute([$id]);
}

function deleteProgressReport($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM progress_reports WHERE id=?");
    return $stmt->execute([$id]);
}

// Get single record functions (for editing)
function getProjectById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM projects WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getTaskById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getEmployeeById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM employees WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getResourceById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM resources WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getRiskById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM risks WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getProgressReportById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM progress_reports WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
