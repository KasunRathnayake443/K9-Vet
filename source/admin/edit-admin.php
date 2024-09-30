<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

if (isset($_GET['id'])) {
    $adminId = intval($_GET['id']);

    $query = "SELECT * FROM admins WHERE A_id = $adminId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
    } else {
        echo "Admin not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $admin['password'];

    $sql = "UPDATE admins SET name = '$name', email = '$email', password = '$password' WHERE A_id = $adminId";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="../img/logo.png" rel="icon">
</head>

<body>
    <div class="container">
        <h1>Edit Admin</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($admin['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password (leave blank to keep current password)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Update Admin</button>
            <a href="admin-management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
