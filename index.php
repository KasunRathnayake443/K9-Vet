<!DOCTYPE html>
<html lang="en">

<head>

<?php
    include 'source/config.php';

    $sql = "SELECT * FROM services LIMIT 6";
    $result = mysqli_query($conn, $sql);
    $services = mysqli_num_rows($result);

    $sql2 = "SELECT * FROM store LIMIT 4";
    $result2 = mysqli_query($conn, $sql2);
    $products = mysqli_num_rows($result2);
?>

    <meta charset="utf-8">
    <title>K9-Vets</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="source/img/logo.png" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   
    <link href="source/lib/animate/animate.min.css" rel="stylesheet">
    <link href="source/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="source/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="source/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   
    <link href="source/css/style.css" rel="stylesheet">
    <link href="source/css/index-shop-cards.css" rel="stylesheet">
    
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
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>K9-Vets</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="source/frontend/about.php" class="nav-item nav-link">About</a>
                <a href="source/frontend/services.php" class="nav-item nav-link">Services</a>
                <a href="source/frontend/shop.php" class="nav-item nav-link">Shop</a>
                <a href="source/frontend/contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <a href="#appointments" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Appointment<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    


    
    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">Your Pet's Well-being is Our Top Priority</h1>
                <div class="row g-4">
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <span style="display:flex; align-items:center; font-size: 24px; " class="text-white text-xl"><h2 class="text-white mb-1" data-toggle="counter-up">10</h2>+</span>
                            <p class="text-light mb-0">Years of Experience</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <span style="display:flex; align-items:center; font-size: 24px; " class="text-white text-xl"><h2 class="text-white mb-1" data-toggle="counter-up">20</h2>+</span>
                            <p class="text-light mb-0">Different Services</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                        <span style="display:flex; align-items:center; font-size: 24px; " class="text-white text-xl"><h2 class="text-white mb-1" data-toggle="counter-up">1000</h2>+</span>
                            <p class="text-light mb-0">Happy Clients</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative" style="overflow:hidden;">
                        <img class="img-fluid " src="source/img/front/dental.jpg" alt="" style="object-fit:cover; width: 100vw; height: 100vh;">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Dental Services</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative" style="overflow:hidden;">
                        <img class="img-fluid" src="source/img/front/Pharmacy.webp" alt="" style="object-fit:cover; width: 100vw; height: 100vh;">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">In-house Pharmacy</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative" style="overflow:hidden;">
                        <img class="img-fluid"  src="source/img/front/salon.jpg" alt="" style="object-fit:cover; width: 100vw; height: 100vh;">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Pet Salon</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="source/img/front/cover1.jpg" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="source/img/front/dog.jpg" alt="" style="margin-top: -25%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">About Us</p>
                    <h1 class="mb-4">Why You Should Trust Us? Get Know About Us!</h1>
                    <p>K-9 Vet Clinic is a beloved veterinary clinic nestled in Anuradhapura. For 10 years, K-9
                                Vet Clinic has been a pillar of support for pet owners in the community, providing
                                compassionate care and expert medical services for their beloved furry companions. Led by
                                a dedicated team of veterinarians and support staff, K-9 Vet Clinic is committed to ensuring
                                the health, happiness, and well-being of every animal that walks through its doors.</p>
                    <p class="mb-4"></p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Quality health care</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Only Qualified Doctors</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Medical Research Professionals</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="source/frontend/about.php">Read More</a>
                </div>
            </div>
        </div>
    </div>
    


    <div class="container" id="services">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Services</p>
            <h1>Health Care Solutions</h1>
        </div>
        <div class="row g-4">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-info rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-heartbeat text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3"><?php echo htmlspecialchars($row['name']); ?></h4>
                        <p class="mb-4">
                            <span class="short-description">
                                <?php echo substr(htmlspecialchars($row['description']), 0, 100); ?>...
                            </span>
                            <span class="full-description d-none">
                                <?php echo htmlspecialchars($row['description']); ?>
                            </span>
                        </p>
                        <a class="btn show-more" href="javascript:void(0);"><i class="fa fa-plus text-primary me-3"></i>Read More</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>



   
    <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        <p class="d-inline-block border rounded-pill text-light py-1 px-4">Features</p>
                        <h1 class="text-white mb-4">Why Choose Us</h1>
                        <p class="text-white mb-4 pb-2">"At K9-Vets, we understand that your pets are part of your family, which is why we are dedicated to providing the highest level of care and compassion. Our commitment to excellence in veterinary medicine ensures that your pets receive personalized attention in a welcoming and supportive environment. With state-of-the-art facilities and a passion for animal welfare, we offer comprehensive health solutions tailored to the unique needs of your furry companions. Trust K9-Vets for reliable, expert care that prioritizes the well-being and happiness of your pets."</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-user-md text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Experience</p>
                                        <h5 class="text-white mb-0">Doctors</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-check text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Quality</p>
                                        <h5 class="text-white mb-0">Services</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-comment-medical text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Positive</p>
                                        <h5 class="text-white mb-0">Consultation</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-headphones text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">24 Hours</p>
                                        <h5 class="text-white mb-0">Support</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="source/img/front/cover2.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Shop</p>
                <h1>Pet Care Essentials Store</h1>
            </div>
        
        <div class="row g-4">
            <?php while ($row = $result2->fetch_assoc()): ?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-card position-relative rounded overflow-hidden">
                    <div class="product-image overflow-hidden">
                        <img class="img-fluid" src="source/img/products/<?php echo htmlspecialchars($row['url']); ?>" alt="">
                    </div>
                    <div class="product-details bg-light text-center p-4">
                        <h5><?php echo htmlspecialchars($row['name']); ?></h5>
                        <p class="text-primary">LKR. <?php echo htmlspecialchars($row['price']); ?></p>
                    </div>
                    <div class="product-hover">
                        <a class="btn btn-simple" href="source/frontend/shop.php">Visit Store</a>
                    </div>
                </div>
            </div> 
            <?php endwhile; ?> 
        </div>

    </div>
    


    
    <div id="appointments" class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Appointment</p>
                    <h1 class="mb-4">Make An Appointment To Visit Our Doctor</h1>
                    <p class="mb-4">"Your pet's health and well-being are our top priorities. Whether it's for a routine check-up or a specific concern, our dedicated veterinarian is here to provide expert care and attention. Schedule an appointment today and take the first step towards ensuring a healthy, happy life for your furry friend. We look forward to welcoming you and your pet to our clinic!"</p>
                    <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h5 class="mb-0">076 0595881</h5>
                        </div>
                    </div>
                    <div class="bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Mail Us Now</p>
                            <h5 class="mb-0">info@k9-vets.com</h5>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                         <form id="appointmentForm" method="POST">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control border-0" name="name" placeholder="Your Name" required style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control border-0" name="email" placeholder="Your Email" required style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control border-0" name="mobile" placeholder="Your Mobile" required style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="date" class="form-control border-0" name="date" id="appointmentDate" required style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select class="form-control border-0" name="time" id="appointmentTime" required style="height: 55px;">
                                            <option value="">Choose Time</option>
                                            <option value="09:00">09:00 AM</option>
                                            <option value="09:30">09:30 AM</option>
                                            <option value="10:00">10:00 AM</option>
                                            <option value="10:30">10:30 AM</option>
                                            <option value="11:00">11:00 AM</option>
                                            <option value="11:30">11:30 AM</option>
                                            <option value="12:00">12:00 PM</option>
                                            <option value="12:30">12:30 PM</option>
                                            <option value="13:00">01:00 PM</option>
                                            <option value="13:30">01:30 PM</option>
                                            <option value="14:00">02:00 PM</option>
                                            <option value="14:30">02:30 PM</option>
                                            <option value="15:00">03:00 PM</option>
                                            <option value="15:30">03:30 PM</option>
                                            <option value="16:00">04:00 PM</option>
                                            <option value="16:30">04:30 PM</option>
                                            <option value="17:00">05:00 PM</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control border-0" name="problem" rows="5" placeholder="Describe your problem" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Book Appointment</button>
                                    </div>
                                    <div class="col-12">
                                        <div id="responseMessage" style="display:none; color: green; font-weight: bold;"></div>
                                    </div>
                                </div>
                        </form>
                    </div>
                 </div>
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
                    <a class="btn btn-link" href="source/frontend/shop.php">Shop</a>
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
    

    


    
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="source/lib/wow/wow.min.js"></script>
    <script src="source/lib/easing/easing.min.js"></script>
    <script src="source/lib/waypoints/waypoints.min.js"></script>
    <script src="source/lib/counterup/counterup.min.js"></script>
    <script src="source/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="source/lib/tempusdominus/js/moment.min.js"></script>
    <script src="source/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="source/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="source/js/main.js"></script>
    <script src="source/js/service-cards.js"></script>
    <script src="source/js/pdf.js"></script>
    <script src="source/js/appointments-date.js"></script>
</body>

</html>