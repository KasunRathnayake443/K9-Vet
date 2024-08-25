<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include '../config.php'; 
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM store WHERE id = $product_id";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);

        
        $sql_others = "SELECT * FROM store WHERE id != $product_id LIMIT 4";
        $result_others = mysqli_query($conn, $sql_others);
    ?>
    <meta charset="utf-8">
    <title>K9-Vets - Buy Now</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="../img/logo.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

<div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Sanghabo Mawatha Pubudhupura, Himaka junction, Anuradhapura</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>076 0595881</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    

   
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="../../index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>K9-Vets</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../../index.php" class="nav-item nav-link">Home</a>
                <a href="../../about.html" class="nav-item nav-link">About</a>
                <a href="../../service.html" class="nav-item nav-link">Services</a>
                <a href="shop.php" class="nav-item nav-link active">Shop</a>
                <a href="../../contact.html" class="nav-item nav-link">Contact</a>
                <a id="cart-icon" href="javascript:void(0);" class="nav-item nav-link">
    <i class="fa fa-shopping-cart"></i>
</a>
            </div>
            <a href="../../index.php#appointments" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Appointment<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <img class="img-fluid w-100" src="../img/products/<?php echo $product['url']; ?>" alt="<?php echo $product['name']; ?>">
                </div>
                <div class="col-lg-6">
                    <h1><?php echo $product['name']; ?></h1>
                    <h3 class="text-primary">Rs. <?php echo $product['price']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <a href="checkout.php?buy=<?php echo $product['id']; ?>" class="btn btn-primary btn-lg">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <h3 class="mb-4">Other Products You Might Be Interested In</h3>
            <div class="row g-4">
                <?php while ($row = mysqli_fetch_assoc($result_others)): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item bg-light">
                            <img class="img-fluid w-100" src="../img/products/<?php echo $row['url']; ?>" alt="<?php echo $row['name']; ?>">
                            <div class="text-center py-3">
                                <a class="h6 text-decoration-none text-truncate" href="product-details.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['name']; ?>
                                </a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>Rs. <?php echo $row['price']; ?></h5>
                                </div>
                                <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary mt-3">View</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    

    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn"  data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5" >
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Sanghabo Mawatha Pubudhupura, Himaka junction, Anuradhapura</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>076 0595881</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@K9-Vets.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Services</h5>
                    <a class="btn btn-link" href="#services">In-House Pharmacy</a>
                    <a class="btn btn-link" href="#services">Dental Service</a>
                    <a class="btn btn-link" href="#services">Pet Salon</a>
                    <a class="btn btn-link" href="#services">Advanced Anesthesia</a>
                    <a class="btn btn-link" href="#services">Laboratory</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="shop.php">Shop</a>
                    <a class="btn btn-link" href="">News</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    
                   
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Stay updated with our latest news and offers. Subscribe to our newsletter.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="index.php">K9-Vets</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
