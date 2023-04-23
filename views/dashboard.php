<?php

session_start();
require "../classes/admin.php";
// print_r($_SESSION);

$admin = new Admin;
$appo_info = $admin->appoSummery();
$count_cutomer = $admin->countCustomer();
$count_service = $admin->countService();
$count_staff = $admin->countStaff();
$count_appo = $admin->countTotalappo();
$count_category = $admin->countCategory();
$appo_cancel = $admin->showCancelrequest();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- css link -->
    <link href="..accets/css/styles.css" rel="stylesheet" />
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


    <div class="display-5 p-4"><i class="fa-solid fa-user-gear"></i> Dashboard</div>

    <div class="row">
        <div class="col-7 mt-5">
            <table class="table table-responsive-lg table-hover mx-auto caption-top">
                <caption class="m-3">
                    <h4>Incoming Booking</h4>
                </caption>
                <thead>
                    <tr class="text-center bg-dark">
                        <th class="text-warning">#</th> <!--appointment_id-->
                        <!-- <th class="text-warning">Customer</th> -->
                        <th class="text-warning">Service</th>
                        <th class="text-warning">Date</th>
                        <th class="text-warning">Status</th>
                        <th class="text-warning"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($appo_summery = $appo_info->fetch_assoc()) {
                        // print_r($appo_summery);
                    
                        ?>

                        <tr class="text-center">
                            <td>
                                <?= $appo_summery['appointment_id'] ?>
                            </td>
                            <td>
                                <?= $appo_summery['service_name'] ?>
                            </td>
                            <td>
                                <?= $appo_summery['appointment_date'] ?>
                            </td>
                            <td>
                                <?= $appo_summery['status'] ?>
                            </td>
                            <td>
                                <a href="view-appo.php?appointment_id=<?=$appo_summery['appointment_id']?>" class="btn btn-dark text-warning">Detail</a>
                            </td>
                        </tr>
                    <tbody>
                        <?php
                    }
                    ?>
            </table>

            <table class="table table-danger table-responsive-lg table-hover mx-auto caption-top mt-5 mb-5">
                <caption class="m-3">
                    <h4> Cancel</h4>
                </caption>
                <thead>
                    <tr class="text-center">
                        <th>#</th> <!--appointment_id-->
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th></th>
                        <!-- <th class="text-warning"></th> -->
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($cancel = $appo_cancel->fetch_assoc()) {

                        ?>


                        <tr class="text-center">
                            <td>
                                <?= $cancel['id'] ?>
                            </td>
                            <td>
                                <?= $cancel['name'] ?>
                            </td>
                            <td>
                                <?= $cancel['service'] ?>
                            </td>
                            <td>
                                <?= $cancel['date'] ?>
                            </td>
                            <td>
                                <?= $cancel['time'] ?>
                            </td>
                            <td>
                                <?= $cancel['status'] ?>
                            </td>
                            <td>
                                <a href="delete-appo.php?appointment_id=<?=$cancel['id']?>" class="btn btn-danger text-white">Delete</a>
                            </td>

                            <!-- <td><a href=".php?_id?=$['id']?>" type="submit" class="btn btn-danger text-white "><i
                        class="fa-solid fa-angles-right"></i>Accept</a>
                            </td> -->

                        </tr>
                    <tbody>
                        <?php
                    }
                    ?>
            </table>

        </div>

        <div class="col-5">
            <div class="row">
                <div class="col mt-5">
                    <div class="card bg-primary m-3 py-3">
                        <div class="display-6 text-warning text-center">Customer</div>
                        <div class="display-6 text-warning text-center"><i class="fa-solid fa-pen"></i>
                            <?php
                            while ($num_cus = $count_cutomer->fetch_assoc()) {
                                echo $num_cus['cus'];
                            }
                            ?>
                        </div>
                        <div class="display-6 text-warning text-center"><a href="customerlist.php"
                                class="btn btn-outline-light text-warning">VIEW</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-5">
                    <div class="card bg-success m-3 py-3">
                        <div class="display-6 text-warning text-center">Appointment</div>
                        <div class="display-6 text-warning text-center"><i class="fa-regular fa-folder-open"></i>
                            <?php
                            while ($num_appo = $count_appo->fetch_assoc()) {
                                echo $num_appo['appo'];
                            }
                            ?>
                        </div>
                        <div class="display-6 text-warning text-center"><a href="appo-manage.php"
                                class="btn btn-outline-light text-warning">VIEW</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card bg-danger m-3 py-3">
                        <div class="display-6 text-warning text-center">Services</div>
                        <div class="display-6 text-warning text-center"><i class="fa-solid fa-pen"></i>
                            <?php
                            while ($num_serv = $count_service->fetch_assoc()) {
                                echo $num_serv['service'];
                            }
                            ?>
                        </div>
                        <div class="display-6 text-warning text-center"><a href="services.php"
                                class="btn btn-outline-light text-warning">VIEW</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-secondary m-3 py-3">
                        <div class="display-6 text-warning text-center">Categories</div>
                        <div class="display-6 text-warning text-center"><i class="fa-regular fa-folder-open"></i>
                            <?php
                            while ($num_category = $count_category->fetch_assoc()) {
                                echo $num_category['category'];
                            }
                            ?>
                        </div>
                        <div class="display-6 text-warning text-center"><a href="categories.php"
                                class="btn btn-outline-light text-warning">VIEW</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card bg-dark m-3 py-3">
                        <div class="display-6 text-warning text-center">Staff</div>
                        <div class="display-6 text-warning text-center"><i class="fa-solid fa-pen"></i>
                            <?php
                            while ($num_staff = $count_staff->fetch_assoc()) {
                                echo $num_staff['staff'];
                            }
                            ?>
                        </div>
                        <div class="display-6 text-warning text-center"><a href="staff.php"
                                class="btn btn-outline-light text-warning">VIEW</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-light m-3 py-3">
                        <div class="display-6 text-warning text-center">Salary</div>
                        <div class="display-6 text-warning text-center"><i class="fa-regular fa-folder-open"></i>
                        </div>
                        <div class="display-6 text-warning text-center"><a href="salary.php"
                                class="btn btn-outline-light text-warning">VIEW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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