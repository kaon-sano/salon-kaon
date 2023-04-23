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

    <div class="container">
        <div class="display-5 mt-5 text-start"> About Us</div>

        <div class="row mt-5 mb-5">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="m-2">
                                <div class="card-img"><img src="../assets/images/home-about1.jpg" alt=""
                                        style="width:500px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="mt-5">
                                <h3 class="text-start">Our salon</h3>
                                <p class="text-start">
                                    <h5>We wish everyone to have healthy hair and a healthy scalp. </h5>
                                    Our service is divided into two main part, Hair Styling and Hair Care. 
                                    In Hair Styling, we consult your hair concern and make your ideal style.  
                                     As for Hair Care, our highly recommendation is Head spa. It is a hair treatment with head massage which gently clean the scalp of dirt,improves blood circulation and reduces muscle stiffness. We have large variety of treatment material such as herbal aroma,honey and so on.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--row1 end-->
        </div>

        <div class="mt-3 mb-5">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="m-2">
                                    <div class="card-img"><img src="../assets/images/home-about2.jpg" alt=""
                                            style="width:500px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="m-5">
                                    <h3 class="text-start">Business Hour</h3>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <ul>
                                                <li>Monday 10:00-18:00</li>
                                                <li>Tuseday Closed</li>
                                                <li>Wednesday 10:00-18:00</li>
                                                <li>Thursday 10:00-18:00</li>
                                                <li>Friday 10:00-18:00</li>
                                                <li>Saturday 10:00-18:00</li>
                                                <li>Sunday 10:00-18:00</li>
                                            </ul>
                                        </div>
                                        <div class="col ms-2">
                                            <ul>
                                                <li>TEL : 000-1234-56798</li>
                                                <br>
                                                <li>Adress :
                                                    000A ABC St, Maryload, D0xx CVyy F8</li>
                                                <br>
                                                <li>Email : kaon-salon@gmail.comxx</li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--row1 end-->
                </div>
            </div>

            <div class="mt-3 mb-3">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <br>
                                    <br>
                                    <h3 class="text-start">Our history</h3>
                                    <br>
                                    <br>
                                    <p class="text-start" >In 2010, two young ambitious beauticians began to run a small beauty hair salon in the city center. In the very begining, it had been not easy to maintin thier business because of the competitive location. To make a difference to other salon, they focused on to improve skills and knowledge to meet not only the local but also the multinational clinent's needs because there were few salon which could offered that kind of services at that time. Although the number wasn't so large, they got clients by word of mouth. Around 2013, as the city accepted more immigrants, the business got on the right track.  
                                    </p>
                                </div>
                                <div class="col-7">
                                    <div class="m-3">
                                        <div class="card-img"><img src="../assets/images/home-about3.jpg" alt=""
                                                class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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