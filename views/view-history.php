<?php

session_start();
require "../classes/admin.php";

$appo_detail = new Admin;
$view_appo=$appo_detail->viewAppo($_GET['appointment_id']);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointment</title>
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
    include "admin-menu.php";
    ?>

    <div class="display-5 p-4"> <i class="fa-regular fa-folder-open"></i> Appointment</div>

    <main class="container">


        <!-- <h2 class="h3 text-muted">Salary Detail</h2> -->

        <div class="m-4 mb-5">
            <table class="table table-hover table-responsive mt-3 mx-5 my-5 caption-top" style="width:500px;">
                <caption>
                    <h2 class="h3 text-muted">Apppointment Detail</h2>
                </caption>
                <thead>
                    <tr>
                        <th scope="col" style="width:40%;"></th>
                        <th scope="col" style="width:50%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Appointment ID</td>
                        <td class="h5 px-5 py-3">
                            <?= $view_appo['id'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Customer Name/ID</td>
                        <td class="h5 px-5 py-3">
                            <?=$view_appo['first_name']?> <?=$view_appo['last_name']?>
                            <br>
                            Account_id : <?=$view_appo['account_id']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Service Name</td>
                        <td class="h5 px-5 py-3">
                            <?=$view_appo['service_name']?> 
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Price</td><!--full name-->
                        <td class="h5 px-5 py-3">
                            $<?=$view_appo['price']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Date</td>
                        <td class="h5 px-5 py-3">
                            <?=$view_appo['date']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Time</td>
                        <td class="h5 px-5 py-3">
                        <?=$view_appo['time']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Message</td>
                        <td class="h5 px-5 py-3">
                           <?=$view_appo['message']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Status</td>
                        <td class="h5 px-5 py-3">
                           <?=$view_appo['status']?>
                        </td>
                    </tr>
                    
                </tbody>
            </table>

            <div>
                <a href="appo-manage.php" class="m-5 h5">Back</a>
            </div>
        </div>
            
    </main>

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-warning">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

</body>

</html>