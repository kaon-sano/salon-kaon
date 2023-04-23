<?php

session_start();

require "../classes/user.php";
$user = new User;
$service_menu = $user->displayService();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services for customer</title>
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

    <!-- <div class="display-5 p-4"><i class="fa-solid fa-scissors"></i> Services</div> -->

    <main class="container py-5">

        <h2 class="h3 text-muted">Service List</h2>

        <div class="mt-3">
            <table class="table table-hover table-responsive-lg mt4">
                <thead class="thead-light">
                    <tr class="text-warning">
                        <!-- <th>Service Category</th> -->
                        <th>Service Name</th>
                        <th>DESCRIPTION</th>
                        <th>PRICE</th>
                        <th style="width: 95px;"></th> <!--for action button-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($service_row = $service_menu->fetch_assoc()) {
                        // print_r($service_row);
                        ?>
                        <tr>
                            <!-- <td class="text-center">
                                <$service_row['category_name'] >
                            </td> -->
                            <td>
                                <?= $service_row['service_name'] ?>
                            </td>
                            <td>
                                <?= $service_row['description'] ?>
                            </td>
                            <td>$ 
                                <?= $service_row['price'] ?>
                            </td>
                            <td>
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
                                <!-- <a href="make-appo.php" class="btn btn-primary text-warning"
                                    style="background-color:#9370DB;">BOOK NOW!</a> -->
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="py-5">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-warning">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

</body>

</html>