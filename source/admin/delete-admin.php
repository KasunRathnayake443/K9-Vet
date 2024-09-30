<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

if (isset($_GET['id'])) {
    $adminId = intval($_GET['id']);

    $query = "DELETE FROM admins WHERE A_id = $adminId";
    
    if ($conn->query($query) === TRUE) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
