<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$email = $_SESSION['email'];

$query = "SELECT * FROM admins ORDER BY A_id ASC";
$result = mysqli_query($conn, $query);
$admins = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $admins[] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_admin'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K9-Vets | Admin Management</title>

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
            <a class="nav-link" href="appointments.php"><i class="fas fa-calendar-alt"></i> Appointments</a>
            <a class="nav-link" href="orders.php"><i class="fas fa-box"></i> Orders</a>
            <a class="nav-link" href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
            <a class="nav-link" href="store.php"><i class="fa-solid fa-store"></i> Store</a>
            <a class="nav-link active" href="admin.php"><i class="fas fa-cogs"></i> Admin</a>
        </nav>
    </div>

    <div class="content">
        <h1>Admin Management</h1>

        <h2>Available Admins</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($admins) > 0): ?>
                        <?php foreach ($admins as $admin): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($admin['A_id']); ?></td>
                                <td><?php echo htmlspecialchars($admin['name']); ?></td>
                                <td><?php echo htmlspecialchars($admin['email']); ?></td>
                                <td>
                                    <a href="edit-admin.php?id=<?php echo $admin['A_id']; ?>" class="btn-action edit"><i class="fas fa-edit "></i></a>
                                    <button class="btn btn-danger" style="background-color: transparent; color: red; border-color: transparent;" onclick="confirmDelete(<?php echo $admin['A_id']; ?>)">
                                <i class="fas fa-trash-alt"></i>
                                     </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No admins available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <h2>Add New Admin</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_admin">Add Admin</button>
        </form>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dateTime.js"></script>
    <script src="../js/logout.js"></script>
    <script>
        function confirmDelete(adminId) {
            if (confirm('Are you sure you want to delete this admin?')) {
                window.location.href = 'delete-admin.php?id=' + adminId;
            }
        }
    </script>
</body>

</html>
