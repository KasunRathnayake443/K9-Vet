<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

if (!isset($_GET['id'])) {
    echo "<script> document.location='appointments.php'</script>";
    exit;
}

$id = $_GET['id'];


$query = "SELECT * FROM appointments WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $appointment = $result->fetch_assoc();
} else {
    echo "<script> alert('Appointment not found!'); document.location='appointments.php';</script>";
    exit;
}


if (isset($_POST['confirm_delete'])) {
    $delete_query = "DELETE FROM appointments WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bind_param("i", $id);

    if ($delete_stmt->execute()) {
        echo "<script> alert('Appointment deleted successfully. Please inform the customer about the cancellation.'); document.location='appointments.php';</script>";
    } else {
        echo "<script> alert('Failed to delete the appointment.'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Appointment | K9-Vets</title>
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
            <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a class="nav-link active" href="appointments.php"><i class="fas fa-calendar-alt"></i> Appointments</a>
            <a class="nav-link" href="orders.php"><i class="fas fa-box"></i> Orders</a>
            <a class="nav-link" href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
            <a class="nav-link" href="store.php"><i class="fa-solid fa-store"></i> Store</a>
            <a class="nav-link" href="admin.php"><i class="fas fa-cogs"></i> Admin</a>
        </nav>
    </div>

    <div class="content">
        <h2>Delete Appointment</h2>
        <p class="text-warning">You are about to delete this appointment. Please make sure to inform the customer about the cancellation.</p>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Appointment Details</h5>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($appointment['date']); ?></p>
                <p><strong>Time:</strong> <?php echo htmlspecialchars($appointment['time']); ?></p>
                <p><strong>Customer:</strong> <?php echo htmlspecialchars($appointment['name']); ?></p>
            </div>
        </div>

        <form action="" method="POST" class="mt-3">
            <button type="submit" name="confirm_delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete Appointment</button>
            <a href="appointments.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dateTime.js"></script>
    <script src="../js/logout.js"></script>
</body>

</html>
