<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$email = $_SESSION['email'];


$product_count_query = "SELECT COUNT(*) AS count FROM store";
$product_count_result = $conn->query($product_count_query);
$product_count = $product_count_result->fetch_assoc()['count'];

$service_count_query = "SELECT COUNT(*) AS count FROM services";
$service_count_result = $conn->query($service_count_query);
$service_count = $service_count_result->fetch_assoc()['count'];

$appointment_count_query = "SELECT COUNT(*) AS count FROM appointments";
$appointment_count_result = $conn->query($appointment_count_query);
$appointment_count = $appointment_count_result->fetch_assoc()['count'];

$order_count_query = "SELECT COUNT(*) AS count FROM orders";
$order_count_result = $conn->query($order_count_query);
$order_count = $order_count_result->fetch_assoc()['count'];

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
    <link href="../img/logo.png" rel="icon">
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
            <a class="nav-link" href="orders.php"><i class="fas fa-box"></i> Orders</a>
            <a class="nav-link" href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
            <a class="nav-link" href="store.php"><i class="fa-solid fa-store"></i> Store</a>
            <a class="nav-link" href="admin.php"><i class="fas fa-cogs"></i> Admin</a>
        </nav>
    </div>

    <div class="content">
        <h1>Welcome to the Admin Dashboard</h1>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header bg-success">
                        Store
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product_count; ?></h5>
                        <p class="card-text">Total Available Products</p>
                        <a href="store.php" class="btn btn-primary">Manage Store</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-primary">
                    <div class="card-header">
                        Services
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $service_count; ?></h5>
                        <p class="card-text">Total Available Services</p>
                        <a href="services.php" class="btn btn-primary">Manage Services</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header bg-secondary">
                        Appointments
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $appointment_count; ?></h5>
                        <p class="card-text">Total Appointments</p>
                        <a href="appointments.php" class="btn btn-primary">View Appointments</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header bg-info">
                        Orders
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $order_count; ?></h5>
                        <p class="card-text">Total Available Orders</p>
                        <a href="orders.php" class="btn btn-primary">Manage Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dateTime.js"></script>
    <script src="../js/logout.js"></script>
</body>
</html>
