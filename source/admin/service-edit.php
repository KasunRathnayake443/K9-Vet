<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$email = $_SESSION['email'];

$serviceId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = "SELECT * FROM services WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $serviceId);
$stmt->execute();
$result = $stmt->get_result();
$service = $result->fetch_assoc();

if (!$service) {
    echo "Service not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serviceName = $_POST['serviceName'];
    $serviceDescription = $_POST['serviceDescription'];
    $serviceImage = $_FILES['serviceImage']['name'];

    if ($serviceImage) {
        $targetDir = "../img/services/";
        $targetFile = $targetDir . basename($serviceImage);
        move_uploaded_file($_FILES['serviceImage']['tmp_name'], $targetFile);

        $query = "UPDATE services SET name = ?, description = ?, url = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $serviceName, $serviceDescription, $serviceImage, $serviceId);
    } else {
        $query = "UPDATE services SET name = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $serviceName, $serviceDescription, $serviceId);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Service updated successfully!'); window.location.href = 'services.php';</script>";
    } else {
        echo "Error updating service.";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K9-Vets | Edit Service</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <link rel="stylesheet" href="../css/admin-store.css">
    <link href="../img/logo.png" rel="icon">

    <style>
        .service-image {
            max-width: 200px;
            margin-bottom: 10px;
        }

        #imagePreview {
            max-width: 200px;
            margin-top: 10px;
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
            <a class="nav-link active" href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
            <a class="nav-link" href="store.php"><i class="fa-solid fa-store"></i> Store</a>
            <a class="nav-link" href="admin.php"><i class="fas fa-cogs"></i> Admin</a>
        </nav>
    </div>

    <div class="content">
        <h1>Edit Service</h1>

        <div class="card mb-4">
            <div class="card-header">
                Update Service Details
            </div>
            <div class="card-body">
                <form action="service-edit.php?id=<?php echo $serviceId; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="serviceName" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="serviceName" name="serviceName" value="<?php echo htmlspecialchars($service['name']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Service Description</label>
                        <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" required><?php echo htmlspecialchars($service['description']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="serviceImage" class="form-label">Change Image</label>
                        <input type="file" class="form-control" id="serviceImage" name="serviceImage" accept="image/*">
                        <?php if ($service['url']): ?>
                            <img src="../img/services/<?php echo htmlspecialchars($service['url']); ?>" class="service-image" id="imagePreview" />
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </form>
            </div>
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