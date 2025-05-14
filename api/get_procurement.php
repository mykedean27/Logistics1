<?php
include '../config.php';
include '../module_functions/project_management/project_function.php';

if (isset($_GET['id'])) {
    $project = getProjectById($conn, $_GET['id']);
    header('Content-Type: application/json');
    echo json_encode($project);
}
else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Project ID is required']);
}
?>