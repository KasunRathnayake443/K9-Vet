<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$email = $_SESSION['email'];

$serviceId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($serviceId > 0) {
   
    $query = "SELECT url FROM services WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $serviceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $service = $result->fetch_assoc();

    if ($service) {
        $imagePath = "../img/services/" . $service['url'];

      
        $query = "DELETE FROM services WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $serviceId);

        if ($stmt->execute()) {
           
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            echo "<script>alert('Service deleted successfully!'); window.location.href = 'services.php';</script>";
        } else {
            echo "<script>alert('Error deleting service.'); window.location.href = 'services.php';</script>";
        }
    } else {
        echo "<script>alert('Service not found.'); window.location.href = 'services.php';</script>";
    }
} else {
    echo "<script>alert('Invalid service ID.'); window.location.href = 'services.php';</script>";
}
?>