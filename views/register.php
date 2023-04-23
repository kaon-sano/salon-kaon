<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- css link -->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <!---- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integzrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        footer {
            margin-top: auto;
        }
    </style>

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

    <h5 class="mt-5 text-center">To make an appointment, please kindly create your account first <i
            class="fa-regular fa-gem"></i></h5>
    <h5 class="m-3 text-center">If you already have an accout, please <i class="fa-regular fa-hand-point-right"></i> <a
            href="">Log in.</a> </h5>

    <div class="card mx-auto w-50 mt-5">
        <form action="../actions/register.php" method="post">

            <div class="card-header border-0" style="background-color:#9370DB;">
                <h1 class="text-warning text-center">Create Your Account</h1>
            </div>
            <div class="card mx-auto">
                <div class="card-body" style="background-color:#efe2ef;">

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="firstname"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="First Name">
                            </div>
                        </div>
                        <div class="col ps-1">
                            <div class="mb-3">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="lastname"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Last Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="username" id="username"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Userame">
                            </div>
                        </div>
                        <div class="col-7 ps-1">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Mobile Number</label>
                                <input type="number" name="mobile" id="mobile"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Mobile Number">
                            </div>
                        </div>
                        <div class="col ps-1">
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" id="address"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Address">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-labeel">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="col ps-1">
                            <div class="mb-3">
                                <label for="" class="form-labeel">Confirm Password</label>
                                <input type="password" name="passwordconf" id="passwordconf"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <input type="submit" name="btn_create" value="GO !" class="btn w-100 text-warning"
                            style="background-color:#9370DB;">
                    </div>

                    <div class="card-text mt-3">
                        <p class="text-center">Already have an account?
                            <a href="login.php" class="small">Log in.</a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
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