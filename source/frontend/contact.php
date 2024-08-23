<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K9-Vets | Contact</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

   
    <style>
       
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

       
        body {
            display: flex;
            flex-direction: column;
        }

        .container.my-5 {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">K9-Vets</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <p>If you have any questions or want to schedule an appointment, feel free to contact us.</p>
                <ul class="list-unstyled">
                    <li><strong>Phone:</strong> +1 (123) 456-7890</li>
                    <li><strong>Email:</strong> info@k9-vets.com</li>
                    <li><strong>Address:</strong> 123 Pet Street, Animal Town, CA 98765</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Contact Form</h3>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 K9-Vets. All Rights Reserved.</p>
    </footer>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>