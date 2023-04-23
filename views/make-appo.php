<?php
require "../classes/user.php";
session_start();

$user = new User;
$service_info = $user->getServiceinfo();
// $staff_info=$make_appo->getStaffname();
// print_r($staff_info);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an appointment</title>

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
    if ($_SESSION['role'] == "C") {
        include 'customer-menu.php';
    } else {
        include 'admin-menu.php';
    }
    ?>

    <div class="container w-50 mx-auto mt-5">
        <form action="../actions/make-appo.php" method="post" class="">
            <div class="card border-2">
                <div class="card-body">
                    <div>
                        <h1 class="display-4 mb-4 mt-3 fw-bold text-center" style="color:#9370DB;"><i
                                class="fa-regular fa-calendar-check"></i> Booking
                        </h1>
                    </div>

                    <!-- <input type="text" name="username" id="username" placeholder="Username"
                        class="mb-4 mt-4 form-control border-top-0 border-end-0 border-start-0 border-3 border-primary rounded-0" required>

                    <input type="email" name="email" id="email" placeholder="Email"
                        class="mb-3 form-control border-top-0 border-end-0 border-start-0 border-3 border-danger rounded-0"required> -->
                    <label for="" class="text-star mb-3">Appointment Date</label>
                    <br>
                    <input type="date" name="appo_date" id="appo_date" placeholder="Date"
                        class="mb-3 form-control border-top-0 border-end-0 border-start-0 border-3 border-info rounded-0"
                        required>
                    <br>

                    <!-- <div class="text-start mb-3">Appointment Time</div>     -->
                    <div class="mb-3 input-group">
                        <label for="" class="input-group-text" style="background-color:#FFF0F5;">Select Appointment
                            time</label>
                        <select type="time" name="appo_time" id="appo_time" class="form-select" required>
                            <option value="" hidden>From 10:00 to 18:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                        </select>
                    </div>
                    <br>

                    <label for="title" class="form-label">Select Service</label>
                    <select type="text" name="service_name" id="service_name" placeholder="Service Name"
                        class="form-select mb-3 border-top-0 border-end-0 border-start-0 border-3 border-warning rounded-0 mt-2"
                        required>
                        <!-- <option value="" hidden>Select </option> -->
                        <?php
                        while ($service_detail = $service_info->fetch_assoc()) {

                            echo "<option value='" . $service_detail['service_id'] . "'>" .
                                $service_detail['service_name'] . "  $" . $service_detail['price'] . "</option>";
                        }
                        ?>
                    </select>
                    <br>

                    <textarea name="message" id="message" cols="3" rows="5" placeholder="Message"
                        class="my-3 form-control border-success border-1 rounded-0"></textarea>

                    <input type="submit" name="btn_make_appo" value="Submit" class="mt-3 btn text-warning w-100"
                        style="background-color:#9370DB;">
                </div>
            </div>
        </form>
    </div>

    <?php
    if ($_SESSION['role'] == "C") {
        echo "<footer class='py-5'>
    <div class='container px-4 px-lg-5'>
        <p class='m-0 text-center text-warning'>Copyright &copy; Your Website 2023</p>
    </div>
</footer>";
    } else {
        echo " <footer class='py-5 bg-dark'>
    <div class='container px-4 px-lg-5'>
        <p class='m-0 text-center text-warning'>Copyright &copy; Your Website 2023</p>
    </div>
</footer>";
    }
    ?>

    <!-- <footer class="py-5">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-warning">Copyright &copy; Your Website 2023</p>
        </div>
    </footer> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

</body>

</html>