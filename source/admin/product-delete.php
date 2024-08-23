<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$email = $_SESSION['email'];


$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($productId > 0) {
    
    $query = "SELECT url FROM store WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        $imageUrl = $product['url'];

   
        $query = "DELETE FROM store WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $productId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            
            if ($imageUrl && file_exists("../img/products/" . $imageUrl)) {
                unlink("../img/products/" . $imageUrl);
            }

            echo "<script>alert('Product deleted successfully!'); window.location.href = 'store.php';</script>";
        } else {
            echo "<script>alert('Error deleting product.'); window.location.href = 'store.php';</script>";
        }
    } else {
        echo "<script>alert('Product not found.'); window.location.href = 'store.php';</script>";
    }
} else {
    echo "<script>alert('Invalid product ID.'); window.location.href = 'store.php';</script>";
}
?>