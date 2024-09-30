<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$email = $_SESSION['email'];


$query = "SELECT * FROM services";
$result = mysqli_query($conn, $query);
$services = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K9-Vets | Services</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <link rel="stylesheet" href="../css/admin-store.css">
    <link href="../img/logo.png" rel="icon">

    <style>
        .service-card {
            margin-bottom: 20px;
        }

        .service-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .icon-button {
            color: #007bff;
            border: none;
            background: none;
        }

        .icon-button:hover {
            color: #0056b3;
        }
    </style>
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
            <a class="nav-link"href="messages.php"><i class="fas fa-envelope"></i> Messages</a>
            <a class="nav-link active" href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
            <a class="nav-link" href="store.php"><i class="fa-solid fa-store"></i> Store</a>
            <a class="nav-link" href="admin.php"><i class="fas fa-cogs"></i> Admin</a>
        </nav>
    </div>

    <div class="content">
        <h1>Services</h1>

        <div class="card mb-4">
            <div class="card-header">
                Add New Service
            </div>
            <div class="card-body">
                <form action="service-add.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="serviceName" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="serviceName" name="serviceName" required>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Service Description</label>
                        <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="serviceImage" class="form-label">Add Image</label>
                        <input type="file" class="form-control" id="serviceImage" name="serviceImage" accept="image/*" required>
                        <img id="imagePreview" style="max-width: 200px; margin-top: 10px;" />
                    </div>
                    <button type="submit" class="btn btn-primary">Add Service</button>
                </form>
            </div>
        </div>

        <h2>Available Services</h2>
        <div class="row">
            <?php if (count($services) > 0): ?>
                <?php foreach ($services as $service): ?>
                    <div class="col-md-4">
                        <div class="card service-card">
                            <img src="../img/services/<?php echo htmlspecialchars($service['url']); ?>" class="card-img-top service-image" alt="Service Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($service['name']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($service['description']); ?></p>
                                <div class="d-flex justify-content-between">
                                    <a href="service-edit.php?id=<?php echo $service['id']; ?>" class="icon-button"><i class="fas fa-edit"></i></a>
                                    <a href="service-delete.php?id=<?php echo $service['id']; ?>" class="icon-button" onclick="return confirm('Are you sure you want to delete this service?');"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No services available.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dateTime.js"></script>
    <script src="../js/logout.js"></script>
    <script>
        document.getElementById('serviceImage').addEventListener('change', function (event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('imagePreview').src = URL.createObjectURL(file);
            }
        });
    </script>
    <?php $_SESSION['email'] = $email; ?>
</body>

</html>