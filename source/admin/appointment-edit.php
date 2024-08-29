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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_date = $_POST['date'];
    $new_time = $_POST['time'];

    $update_query = "UPDATE appointments SET date = ?, time = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssi", $new_date, $new_time, $id);

    if ($update_stmt->execute()) {
        echo "<script> alert('Appointment updated successfully. Please inform the customer about the new date and time.'); document.location='appointments.php';</script>";
    } else {
        echo "<script> alert('Failed to update appointment.'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment | K9-Vets</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <link rel="stylesheet" href="../css/admin-appointments.css">
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
        <div class="container mt-5">
            <h2>Edit Appointment</h2>
            <p class="text-warning">Please inform the customer about the updated appointment date and time after making changes.</p>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="date" class="form-label">Appointment Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars($appointment['date']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Appointment Time</label>
                    <input type="time" class="form-control" id="time" name="time" value="<?php echo htmlspecialchars($appointment['time']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Appointment</button>
            </form>
            <a href="appointments.php" class="btn btn-secondary mt-3">Back to Appointments</a>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
