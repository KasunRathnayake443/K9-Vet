<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serviceName = mysqli_real_escape_string($conn, $_POST['serviceName']);
    $serviceDescription = mysqli_real_escape_string($conn, $_POST['serviceDescription']);
    $serviceImage = $_FILES['serviceImage']['name'];
    $target_dir = "../img/services/";
    $target_file = $target_dir . basename($serviceImage);
    
    
    $check = getimagesize($_FILES['serviceImage']['tmp_name']);
    if ($check !== false) {
        
        if (move_uploaded_file($_FILES['serviceImage']['tmp_name'], $target_file)) {
            $query = "INSERT INTO services (name, description, url) VALUES ('$serviceName', '$serviceDescription',  '$serviceImage')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Service added successfully');</script>";
                echo "<script>document.location='services.php';</script>";
            } else {
                echo "<script>alert('Error adding service: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    } else {
        echo "<script>alert('File is not an image.');</script>";
    }
}
?>