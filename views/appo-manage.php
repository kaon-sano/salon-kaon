<?php

session_start();
require "../classes/admin.php";

$admin = new Admin;
$pending = $admin->displayPendingappo();
$confirm = $admin->displayConfirmappo();
$today = $admin->displayTodayappo();
$done = $admin->displayDoneappo();
$num_pending = $admin->countPending();
$num_confirm = $admin->countConfirm();
$num_today = $admin->countToday();
$num_done = $admin->countDone();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <!-- css link -->
    <link href="css/styles.css" rel="stylesheet" />
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
    include "admin-menu.php";
    ?>

    <div class="display-5 p-4"> <i class="fa-regular fa-calendar-check"></i> Appointment</div>

    <main class="container py-5">
        <div class="float-start mt-5 mb-3">
            <div class="row">

                <h2 class="text-muted">Appointment List</h2>

                <div class="col">
                    <div class="card text-white bg-success p-2 text-center">
                        <?php
                        while ($num_p = $num_pending->fetch_assoc()) {
                            // print_r($num_p);
                            echo "<h4>Pending " . $num_p['pending'] . "</h4>";
                        }
                        ?>
                    </div>
                </div>

                <div class="col">
                    <div class="card text-white bg-primary p-2 text-center">
                        <?php
                        while ($num_c = $num_confirm->fetch_assoc()) {
                            // print_r($num_c);
                            echo "<h4>Confirm " . $num_c['confirm'] . "</h4>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-warning p-2 text-center">
                        <?php
                        while ($num_t = $num_today->fetch_assoc()) {
                            // print_r($num_c);
                            echo "<h4>Today " . $num_t['today'] . "</h4>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-secondary text-center p-2">
                        <?php
                        while ($num_d = $num_done->fetch_assoc()) {
                            // print_r($num_d);
                            echo "<h4>Done " . $num_d['done'] . "</h4>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <table class="table table-hover table-success table-responsive-lg mt4 caption-top">
                <caption>
                    <h4>Pending</h4>
                </caption>
                <thead>
                    <tr>
                        <th class="text-center">Appointment ID</th> <!--appointment_id-->
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th class="text-center">Staff</th>
                        <th style="width: 95px;">Action</th> <!--for action button-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($pending_appo = $pending->fetch_assoc()) {
                        ?>

                        <tr>
                            <td class="text-center">
                                <?= $pending_appo['id'] ?>
                            </td>
                            <td>
                                <?= $pending_appo['username'] ?>
                            </td>
                            <td>
                                <?= $pending_appo['service_name'] ?>
                            </td>
                            <td>$
                                <?= $pending_appo['price'] ?>
                            </td>
                            <td>
                                <?= $pending_appo['date'] ?>
                            </td>
                            <td>
                                <?= $pending_appo['time'] ?>
                            </td>
                            <td>
                                <?= $pending_appo['message'] ?>
                            </td>
                            <td>
                                <?= $pending_appo['status'] ?>
                            </td>
                            <td class="text-center">
                                <?= $pending_appo['staff_id'] ?>
                            </td>
                            <td>
                                <a href="update-appo.php?appointment_id=<?= $pending_appo['id'] ?>"
                                    class="btn btn-dark text-warning btn-sm">Confirm</i></a>
                                
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <table class="table table-hover table-info table-responsive-lg mt4 caption-top">
                <caption>
                    <h4>Confirm</h4>
                </caption>
                <thead>
                    <tr>
                        <th class="text-center">Appointment ID</th> <!--appointment_id-->
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th class="text-center">Staff ID</th> <!--satff_id default value-->
                        <th>Staff Name</th> <!--satff_id default value-->
                        <th style="width: 95px;">Action</th> <!--for action button-->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($confirm_appo = $confirm->fetch_assoc()) {
                        ?>

                        <tr>
                            <td class="text-center">
                                <?= $confirm_appo['id'] ?>
                            </td>
                            <td>
                                <?= $confirm_appo['username'] ?>
                            </td>
                            <td>
                                <?= $confirm_appo['service_name'] ?>
                            </td>
                            <td>$
                                <?= $confirm_appo['price'] ?>
                            </td>
                            <td>
                                <?= $confirm_appo['date'] ?>
                            </td>
                            <td>
                                <?= $confirm_appo['time'] ?>
                            </td>
                            <td>
                                <?= $confirm_appo['status'] ?>
                            </td>
                            <td class="text-center">
                                <?= $confirm_appo['staff_id'] ?>
                            </td>
                            <td>
                                <?= $confirm_appo['first_name'] ?>
                                <?= $confirm_appo['last_name'] ?>
                            </td>
                            <td>
                                <a href="update-appo.php?appointment_id=<?= $confirm_appo['id'] ?>"
                                    class="btn btn-outline-danger btn-sm"><i class="fas fa-pencil-alt"></i></a>

                            </td>
                            <td>
                                <a href="view-appo.php?appointment_id=<?= $confirm_appo['id'] ?>"
                                    class="btn btn-primary text-white">View</i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <table class="table table-hover table-warning table-responsive-lg mt-4 caption-top">
                <caption>
                    <h4>Today</h4>
                </caption>
                <thead>
                    <tr>
                        <th class="text-center">Appointment ID</th> 
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th class="text-center">Staff ID</th>
                        <th>Staff Name</th>
                        <th>Action</th> 
                        <!-- <th style="width: 95px;"></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($today_appo = $today->fetch_assoc()) {
                        ?>

                        <tr>
                            <td class="text-center">
                                <?= $today_appo['id'] ?>
                            </td>
                            <td>
                                <?= $today_appo['username'] ?>
                            </td>
                            <td>
                                <?= $today_appo['service_name'] ?>
                            </td>
                            <td>$
                                <?= $today_appo['price'] ?>
                            </td>
                            <td>
                                <?= $today_appo['date'] ?>
                            </td>
                            <td>
                                <?= $today_appo['time'] ?>
                            </td>
                            <td>
                                <?= $today_appo['status'] ?>
                            </td>
                            <td class="text-center">
                                <?= $today_appo['staff_id'] ?>
                            </td>
                            <td>
                                <?= $today_appo['first_name'] ?>
                                <?= $today_appo['last_name'] ?>
                            </td>
                            <td>
                                <a href="update-appo.php?appointment_id=<?= $today_appo['id'] ?>"
                                    class="btn btn-outline-danger btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td><a href="view-appo.php?appointment_id=<?= $today_appo['id'] ?>"
                                    class="btn btn-warning text-white">View</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <table class="table table-hover table-light table-responsive-lg mt4 caption-top">
                <caption>
                    <h4>Done</h4>
                </caption>
                <thead>
                    <tr>
                        <th class="text-center">Appointment ID</th> 
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th class="text-center">Staff ID</th> 
                        <th>Staff Name</th> 
                        <th style="width: 95px;">Acction</th>
                        <th style="width: 95px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($done_appo = $done->fetch_assoc()) {
                        ?>

                        <tr>
                            <td class="text-center">
                                <?= $done_appo['id'] ?>
                            </td>
                            <td>
                                <?= $done_appo['username'] ?>
                            </td>
                            <td>
                                <?= $done_appo['service_name'] ?>
                            </td>
                            <td>$
                                <?= $done_appo['price'] ?>
                            </td>
                            <td>
                                <?= $done_appo['date'] ?>
                            </td>
                            <td>
                                <?= $done_appo['time'] ?>
                            </td>
                            <td>
                                <?= $done_appo['status'] ?>
                            </td>
                            <td class="text-center">
                                <?= $done_appo['staff_id'] ?>
                            </td>
                            <td>
                                <?= $done_appo['first_name'] ?>
                                <?= $done_appo['last_name'] ?>
                            </td>
                            <!-- <td>
                                <a href="update-appo.php?appointment_id=<= $done_appo['id']?>"
                                    class="btn btn-outline-secondary"><i class="fas fa-pencil-alt"></i></a>
                            </td> -->
                            <<td><a href="view-history.php?appointment_id=<?= $done_appo['id']?>"
                                    class="btn btn-secondary text-white">View</i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
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