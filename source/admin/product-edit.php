<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$email = $_SESSION['email'];


$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;


$query = "SELECT * FROM store WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product not found!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_FILES['productImage']['name'];

   
    if ($productImage) {
        $targetDir = "../img/products/";
        $targetFile = $targetDir . basename($productImage);
        move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFile);

        
        $query = "UPDATE store SET name = ?, description = ?, price = ?, url = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssdsi", $productName, $productDescription, $productPrice, $productImage, $productId);
    } else {
        
        $query = "UPDATE store SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssdi", $productName, $productDescription, $productPrice, $productId);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Product updated successfully!'); window.location.href = 'store.php';</script>";
    } else {
        echo "Error updating product.";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K9-Vets | Edit Product</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <link rel="stylesheet" href="../css/admin-store.css">

    <style>
        .product-image {
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
            <a class="nav-link" href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
            <a class="nav-link active" href="store.php"><i class="fa-solid fa-store"></i> Store</a>
            <a class="nav-link" href="admin.php"><i class="fas fa-cogs"></i> Admin</a>
        </nav>
    </div>

    <div class="content">
        <h1>Edit Product</h1>

        <div class="card mb-4">
            <div class="card-header">
                Update Product Details
            </div>
            <div class="card-body">
                <form action="product-edit.php?id=<?php echo $productId; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Product Price (Rs.)</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" value="<?php echo htmlspecialchars($product['price']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Change Image</label>
                        <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*">
                        <?php if ($product['url']): ?>
                            <img src="../img/products/<?php echo htmlspecialchars($product['url']); ?>" class="product-image" id="imagePreview" />
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dateTime.js"></script>
    <script src="../js/logout.js"></script>
    <script>
        document.getElementById('productImage').addEventListener('change', function (event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('imagePreview').src = URL.createObjectURL(file);
            }
        });
    </script>
    <?php $_SESSION['email'] = $email; ?>
</body>

</html>