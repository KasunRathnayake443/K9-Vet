<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K9-Vets | Admin Login</title>

    <link rel="stylesheet" href="source/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="source/css/admin-login.css">

 
   
</head>
<body>

   
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">K9-Vets</a>
            <span id="date-time"></span>
        </div>
    </nav>

    <div class="login-container">
        <h2 class="text-center mb-4">Admin Login</h2>
        <form action="source/admin/admin-login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
    <script src="source/js/dateTime.js"></script>
    <script src="source/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>