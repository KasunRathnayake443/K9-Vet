<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include '../config.php'; 
        $sql = "SELECT * FROM store";
        $result = mysqli_query($conn, $sql);
    ?>
    <meta charset="utf-8">
    <title>K9-Vets - Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="../img/logo.png" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/index-shop-cards.css" rel="stylesheet">
    <link href="../css/shop.css" rel="stylesheet">
    <link href="../css/cart.css" rel="stylesheet">

<style>
    .cart-sidebar {
        position: fixed;
        top: 0;
        right: -300px; 
        width: 300px;
        height: 600px;
        margin-top: 75px;
        background: #f8f9fa;
        box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
        transition: right 0.3s ease-in-out;
        z-index: 1000;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .cart-sidebar.open {
        right: 0; 
    }

    .cart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .close-cart {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .cart-items {
        flex: 1;
        overflow-y: auto;
        margin-bottom: 20px;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .cart-item h6 {
        margin: 0;
    }

    .cart-item button {
        background: none;
        border: none;
        color: #dc3545;
        cursor: pointer;
        font-size: 1.25rem;
    }

    .cart-footer {
        text-align: center;
    }
</style>

</head>

<body>
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
   


    
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
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="services.php" class="nav-item nav-link">Services</a>
                <a href="shop.php" class="nav-item nav-link active">Shop</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <a id="cart-icon" href="javascript:void(0);" class="nav-item nav-link">
    <i class="fa fa-shopping-cart"></i>
</a>
            </div>
            <a href="../../index.php#appointments" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Appointment<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>

    
    <div class="container-fluid header bg-info p-0 mb-5">
        <div class="row g-0 align-items-center">
            <div class="col-lg-12 p-5 text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white">Our Shop</h1>
            </div>
        </div>
    </div>

   
    <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="../img/products/<?php echo $row['url']; ?>" alt="<?php echo $row['name']; ?>">
                        </div>
                        <div class="text-center py-4">
                            <div class="product-action">
                                <a href="javascript:void(0);" class="btn btn-outline-dark add-to-cart-btn" 
                                   data-id="<?php echo $row['id']; ?>" 
                                   data-name="<?php echo $row['name']; ?>" 
                                   data-price="<?php echo $row['price']; ?>">
                                    Add to Cart
                                </a>
                                <a href="checkout.php?buy=<?php echo $row['id']; ?>" class="btn btn-primary">Buy Now</a>
                            </div>
                            <a class="h6 text-decoration-none text-truncate" href="product-details.php?id=<?php echo $row['id']; ?>">
                                <?php echo $row['name']; ?>
                            </a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>Rs. <?php echo $row['price']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>



<div id="cart-sidebar" class="cart-sidebar">
    <div class="cart-header">
        <h5>Your Cart</h5>
        <button id="close-cart" class="close-cart">&times;</button>
    </div>
    <div id="cart-items" class="cart-items">
       
    </div>
    <div class="cart-footer">
        <h6>Total: <span id="cart-total">Rs 0</span></h6>
        <a href="checkout.php" class="btn btn-primary w-100">Checkout</a>
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
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/cart.js"></script>
</body>
</html>
