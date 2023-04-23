<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaon beauty hair Salon</title>
    <!-- css link -->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <!---- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integzrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <!-- Responsive navbar-->

    <?php
    // print_r($_SESSION);
    if (!isset($_SESSION['role'])) {
        ?>
        <nav class="navbar navbar-expand-lg">
            <div class="container px-5">
                <a class="navbar-brand text-warning" href="home.php"><i class="fa-solid fa-scissors"></i> Kaon's Beauty
                    Hair Salon
                    <i class="fa-solid fa-hand-holding-heart"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-warning" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="home-about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="customer-servicelist.php
                        ">Services and Price</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="register.php">Booking </a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="login.php"><i
                                    class="fa-solid fa-user"></i> Log
                                In</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="https://www.facebook.com/"><i
                                    class="fa-brands fa-facebook"></i></a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="https://www.instagram.com/"><i
                                    class="fa-brands fa-square-instagram"></a></i></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="https://twitter.com/"><i
                                    class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php

    } else {
        if ($_SESSION['role'] == "C") {
            include 'customer-menu.php';
        } elseif ($_SESSION['role'] == "A") {
            include 'admin-menu.php';
        }
    }

    ?>

    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="../assets/images/homepic.jpg"
                    alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Welcome to our
                    Salon !</h1>
                <p>The purpose of our salon is to make client's hair facinating and keep it healthy! We've focused on
                    not only hair styling but also hair and scalp care since we opened. Our rich-experienced and highly
                    qualified team offere the best service to suit your requirment!</p>
                <?php
                if (isset($_SESSION['role'])) {
                    ?>
                    <a class="btn btn-primary text-warning" href="make-appo.php">Book Now!</a>
                    <?php
                } else {
                    ?>
                    <a class="btn btn-primary text-warning" href="register.php">Book Now!</a>
                    <?php
                }
                ?>
            </div>
        </div>
        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">About US</h2>
                        <p class="card-text">It's been around ten years we started! We pride ourselves in delivering
                            proper consultations to ensure that our clinet receive the best advice for their hair style
                            and care.</p>
                        <img src="../assets/images/home card1.jpg" class="card-img" alt="">
                    </div>
                    <div class="card-footer"><a class="btn btn-primary text-warning" href="home-about.php">More Info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Services</h2>
                        <p class="card-text">We offer expert skills & the latest trends in hair cut, colour, prem, hair
                            rebonding, hair care & set menu with reasonable price.</p>
                        <img src="../assets/images/home card2.jpg" class="card-img" alt="">
                    </div>
                    <div class="card-footer"><a class="btn btn-primary text-warning"
                            href="customer-servicelist.php">More Info</a></div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Our Staff</h2>
                        <p class="card-text mb-3">Our Team of professionals dedicated to providng the best look for you.
                            We all are welcome everyone,any gender and age.</p>
                        <img src="../assets/images/home card3.jpg" class="card-img" alt="">
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary text-warning" href="home-staff.php">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
   <footer class="py-5">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-warning">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>