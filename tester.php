<?php
// Update the path below if config.php is in a different directory, e.g. './config.php' or 'config.php'
@include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HR3 Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        .bg-side {
            background: #4A628A !important;
        }
        .dropdown-bg {
            background: #4A628A !important;
            color: white;
        }
        .dropdown-bg .dropdown-item {
            color: white;
        }
        .dropdown-bg .dropdown-item:hover {
            background: #3a4e6a;
        }
        a.disabled {
    color: gray;
    pointer-events: none;
  }
span.white-text{
    color: white !important;

    
}
.bg-side{
    background: #4A628A !important ;
}
.nav-item{
     color: white ;
     
}
.nav-link{
    color: white !important;
   
}
.nav-link li a:hover{
    background-color: #75a1c6 ;
    border-radius: 5px;
}
.nav-link li .active{
    background-color: #75a1c6 !important;
    width: fit-content;
    height: fit-content;
    border-radius: 5px;
}
.dropdown-item:hover{
    background-color: #75a1c6 ;
}
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="center bg-side col-auto col-md-3 col-xl-2 px-sm-2 px-0 min-vh-100">
            <div class="d-flex flex-column align-items-sm-start px-3 pt-2 text-white min-vh-100" style="background: #4A628A;">
                <a href="!#" class="d-flex text-decoration-none align-items-center mb-md-0 p-1 text-white text-decoration-none">
                    <img src="../logo.png" width="65" height="65" alt="">
                    <span class="fs-5 d-none d-sm-inline fw-bold" style="color: white;">HR3</span>
                </a>
                <ul class="nav nav-link flex-column mb-sm-auto mb-0 align-items-center align-items-sm-center" id="menu" style="color: white;">
                    <!-- Modules -->
                    <li class="my-2">
                        <a href="#submenu" data-bs-toggle="collapse" class="nav-link align-middle p-2">
                            <i class="fs-4 fa fa-clock"></i> <span class="ms-1 d-none d-sm-inline">Time Attendance</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1 px-3" id="submenu" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="time tracking.php" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Attendance Tracking</span></a>
                            </li>
                            <li>
                                <a class="nav-link disabled p-2 rounded-1"> <span class="d-none d-sm-inline">Disabled</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="my-2">
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link align-middle p-2">
                            <i class="fs-4 fa fa-table"></i> <span class="ms-1 d-none d-sm-inline">Time Sheets</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1 px-3" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Item</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Item</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="my-2">
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link align-middle p-2">
                            <i class="fs-4 fa fa-calendar-check"></i> <span class="ms-1 d-none d-sm-inline">Shifting Schedule</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1 px-3" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Item</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Item</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="my-2">
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link align-middle p-2">
                            <i class="fs-4 fa fas fa-briefcase"></i> <span class="ms-1 d-none d-sm-inline">Leave Management</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1 px-3" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Item</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Item</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="my-2">
                        <a href="#submenu4" data-bs-toggle="collapse" class="nav-link align-middle p-2">
                            <i class="fs-4 fa fas fa-hand-middle-finger"></i> <span class="ms-1 d-none d-sm-inline">Claims & Reimbursements</span>
                        </a>
                        <ul class="collapse nav flex-column ms-1 px-3" id="submenu4" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Item</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link p-2 rounded-1"> <span class="d-none d-sm-inline">Item</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <!-- dropdown user -->
                <div class="dropdown pb-4">
                    <a href="!#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../logo.png" width="30" height="30" alt="profile pic" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Profile</span>
                    </a>
                    <ul class="dropdown-menu dropdown-bg text-small shadow">
                        <li><a href="#" class="dropdown-item">Setting</a></li>
                        <li><a href="#" class="dropdown-item">Profile</a></li>
                        <li><a href="#" class="dropdown-item">Help & Support</a></li>
                        <li><a href="#" class="dropdown-item">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            <!-- Main Content -->
            <div class="container">
                <h1 class="mb-4">Welcome to HR3 Dashboard</h1>
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-clock me-2"></i>Time Attendance</h5>
                                <p class="card-text">Track employee attendance and manage time logs efficiently.</p>
                                <a href="time tracking.php" class="btn btn-primary btn-sm">Go to Attendance</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-table me-2"></i>Time Sheets</h5>
                                <p class="card-text">Manage and review employee timesheets for payroll and reporting.</p>
                                <a href="#" class="btn btn-primary btn-sm">View Timesheets</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-calendar-check me-2"></i>Shifting Schedule</h5>
                                <p class="card-text">Organize and assign employee shifts with ease.</p>
                                <a href="#" class="btn btn-primary btn-sm">Manage Shifts</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-briefcase me-2"></i>Leave Management</h5>
                                <p class="card-text">Approve, reject, and track employee leave requests.</p>
                                <a href="#" class="btn btn-primary btn-sm">Manage Leaves</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-hand-holding-usd me-2"></i>Claims & Reimbursements</h5>
                                <p class="card-text">Process and monitor employee claims and reimbursements.</p>
                                <a href="#" class="btn btn-primary btn-sm">View Claims</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </div>
</div>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>