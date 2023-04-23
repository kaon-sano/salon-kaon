<?php

session_start();

require "../classes/user.php";
$user = new User;
$my_appo = $user->viewMYappo();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View appo</title>
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
        html, body {
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
    include "customer-menu.php";
    ?>

    <main class="container py-5">

        <h2 class="display-5">Your Booking</h2>

        <div class="mt-5">
            <table class="table table-hover table-warning table-responsive-lg mt4">
                <thead class="thead-light">
                    <tr style="color:#9370DB">
                        <th class="text-center">Booking ID</th>
                        <th>Service Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th style="width: 95p;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($my_appo_data = $my_appo->fetch_assoc()) {
                        // print_r($my_appo_data);
                        ?>

                        <tr>
                            <td class="text-center">
                                <?= $my_appo_data['appointment_id'] ?>
                            </td>
                            <td>
                                <?= $my_appo_data['service_name'] ?>
                            </td>
                            <td>
                                $ <?= $my_appo_data['price'] ?>
                            </td>
                            <td>
                                <?= $my_appo_data['appointment_date'] ?>
                            </td>
                            <td>
                                <?= $my_appo_data['appointment_time'] ?>
                            </td>
                            <td>
                                <?= $my_appo_data['status'] ?>
                            </td>
                            <td>
                                <a href="cancel-request.php?appointment_id=<?=$my_appo_data['appointment_id']?>" class="btn btn-primary text-warning"
                                    style="background-color:#9370DB" class="btn">Cancel</a>
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