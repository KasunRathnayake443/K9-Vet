<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$email = $_SESSION['email'];

$query = "SELECT * FROM orders ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
$orders = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K9-Vets | Orders</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <link rel="stylesheet" href="../css/admin-orders.css">
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
            <a class="nav-link" href="appointments.php"><i class="fas fa-calendar-alt"></i> Appointments</a>
            <a class="nav-link active" href="orders.php"><i class="fas fa-box"></i> Orders</a>
            <a class="nav-link"href="messages.php"><i class="fas fa-envelope"></i> Messages</a>
            <a class="nav-link" href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
            <a class="nav-link" href="store.php"><i class="fa-solid fa-store"></i> Store</a>
            <a class="nav-link" href="admin.php"><i class="fas fa-cogs"></i> Admin</a>
        </nav>
    </div>

    <div class="content">
        <h1>Orders</h1>

        <h2>Recent Orders</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($orders) > 0): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td><?php echo htmlspecialchars($order['name']); ?></td>
                                <td><?php echo htmlspecialchars($order['email']); ?></td>
                                <td><?php echo htmlspecialchars($order['phone']); ?></td>
                                <td><?php echo htmlspecialchars($order['address']); ?></td>
                                <td>Rs <?php echo htmlspecialchars($order['total_price']); ?></td>
                                <td><?php 
                                echo htmlspecialchars($order['status']); 
                                if ($order['status'] == 'Pending') {
                                    echo '<i style="color: orange; margin-left: 24px;" class="fas fa-hourglass-start status-icon status-pending"></i>';
                                } elseif ($order['status'] == 'Shipped') {
                                    echo '<i style="color: blue; margin-left: 10px;" class="fas fa-ship status-icon status-shipped"></i>';
                                } 
                                elseif ($order['status'] == 'Delivered') {
                                    echo '<i style="color: green; margin-left: 10px;" class="fas fa-check status-icon status-shipped"></i>';
                                } 
                                elseif ($order['status'] == 'Canceled') {
                                    echo '<i style="color: red; margin-left: 10px;" class="fas fa-times status-icon status-shipped"></i>';
                                } 
                                
                            ?></td>
                                <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                                <td>
                                    <a href="order-edit.php?id=<?php echo $order['id']; ?>" class="btn-action edit"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center">No orders available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dateTime.js"></script>
    <script src="../js/logout.js"></script>
</body>

</html>
