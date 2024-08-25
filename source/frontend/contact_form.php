<?php

include '../config.php';


$success = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    
    if ($stmt->execute()) {
        $success = true;
    } else {
        $success = false;
    }

    $stmt->close();
}


$conn->close();

if ($success) {
    echo "<script>
        alert('Message sent successfully!');
        window.location.href = 'contact.php';
    </script>";
} else {
    echo "<script>
        alert('Failed to send the message.');
        window.location.href = 'contact.php';
    </script>";
}
?>
