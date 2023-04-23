<?php

session_start();
require "../classes/admin.php";

$delete_appo= new Admin;
$delete=$delete_appo->viewAppo($_GET['appointment_id'])


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css link -->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <!---- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integzrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Delete Appointment</title>
</head>

<body>

<?php
   include "admin-menu.php";
   ?>


    <main class="row justify-content-center gx-8 mt-5">
        <div class="col-4 text-center">
            <i class="fa-solid fa-triangle-exclamation text-warning display-4 d-block mb-2"></i>
            <h2 class="text-danger mb-5">Delete Appointment</h2>

            <div class="m-5 text-start">
               <h4>Appointment ID : <?=$delete['id']?></h4>
               <h4>Date : <?=$delete['date']?></h4>
               <h4>Time : <?=$delete['time']?></h4>
               <h4>Service : <?=$delete['service_name']?></h4>
               <h4>Status : <?=$delete['status']?></h4>
            </div>

            <p class="fw-bold">Are you sure you want to delete This appointment?</p>
            <div class="row">
                <div class="col">
                    <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
                </div>
                <div class="col">
                    <form action="../actions/delete-appo.php" method="post">
                        <input type="hidden" name="appointment_id" value="<?=$delete['id']?>">
                        <button type="submit" class="btn btn-outline-danger w-100">Delete</button>
                    </form>

                </div>

            </div>
        </div>

    </main>

</body>

</html>