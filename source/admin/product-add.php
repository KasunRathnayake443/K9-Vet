<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productPrice = $_POST['productPrice'];
    
   
    $targetDir = "../img/products/";
    $imageName = basename($_FILES['productImage']['name']);
    $targetFilePath = $targetDir . $imageName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

   
    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFilePath)) {
            
            $sql = "INSERT INTO store (name, description, price, url) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssis", $productName, $productDescription, $productPrice, $imageName);

            if ($stmt->execute()) {
                echo "<script>alert('Product added successfully!'); window.location.href='store.php';</script>";
            } else {
                echo "<script>alert('Error: Could not add product.'); window.location.href='store.php';</script>";
            }
        } else {
            echo "<script>alert('Error: Could not upload image.'); window.location.href='store.php';</script>";
        }
    } else {
        echo "<script>alert('Error: Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.'); window.location.href='store.php';</script>";
    }
}

?>