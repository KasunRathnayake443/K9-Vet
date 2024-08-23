<?php
session_start();
include '../config.php';
if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K9-Vets | Admin Dashboard</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
</head>

<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span id="date-time" class="nav-link"></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" onclick="return confirmLogout();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   
    <div class="sidebar">
        <h4>Admin Menu</h4>
        <nav class="nav flex-column">
            <a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a class="nav-link" href="appointments.php"><i class="fas fa-calendar-alt"></i> Appointments</a>
            <a class="nav-link" href="patients.php"><i class="fas fa-dog"></i> Patients</a>
            <a class="nav-link" href="staff.php"><i class="fas fa-user-md"></i> Staff</a>
            <a class="nav-link" href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
            <a class="nav-link" href="store.php"><i class="fa-solid fa-store"></i> Store</a>
            <a class="nav-link" href="settings.php"><i class="fas fa-cogs"></i> Settings</a>
        </nav>
    </div>

    
    <div class="content">
        <h1>Welcome to the Admin Dashboard</h1>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Overview
                    </div>
                    <div class="card-body">
                        <p>Manage appointments, patients, and staff efficiently with the tools available in this dashboard.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Quick Actions
                    </div>
                    <div class="card-body">
                        <p><a href="appointments.php" class="btn btn-primary btn-sm"><i class="fas fa-calendar-alt"></i> View Appointments</a></p>
                        <p><a href="patients.php" class="btn btn-primary btn-sm"><i class="fas fa-dog"></i> Manage Patients</a></p>
                        <p><a href="staff.php" class="btn btn-primary btn-sm"><i class="fas fa-user-md"></i> Manage Staff</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dateTime.js"></script>
    <script src="../js/logout.js"></script>

    <?php
     $_SESSION['email'] = $email;
     ?>
</body>
</html>