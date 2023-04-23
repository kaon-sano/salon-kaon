<?php

session_start();

require "../classes/admin.php";
$admin = new Admin;
$appo_status = $admin->getAppo($_GET['appointment_id']);
// print_r($appo_status);
$staff_name = $admin->getAllstaffname();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
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

    <main class="py-5">
        <div class="card w-25 mx-auto mb-5">
            <div class="card-header bg-success text-warning">
                <h2 class="card-title h4 mb-0">Update Appointment</h2>
            </div>
            <div class="card-body">

            <div class="mt-3 mb-3">
                        <h5>Appointment ID
                            <?= $appo_status['appointment_id'] ?>
                        </h5>
                    </div>
                <form action="../actions/update-appo.php" method="post">

                    <input type="hidden" name="appointment_id" value="<?= $appo_status['appointment_id'] ?>" required>
                    
                    <label for="title" class="mt-3 form-label small">Update Status</label>
                    <select name="status" id="status" class="form-select mb-4" required>
                        <option value="" hidden>Select Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Confirm">Confirm</option>
                        <option value="Done">Done</option>
                    </select>

                    <label for="title" class="mt-2 form-label small">Assign Staff</label>
                    <select name="staff_id" id="staff_id" class="form-select mb-4">
                        <option value="" hidden>Select Staff</option>
                        <?php
                        while ($staff = $staff_name->fetch_assoc()) {
                            echo "<option value='" . $staff['staff_id']."'>"
                                . $staff['first_name'] . " ".$staff['last_name']." # ".$staff['staff_id']."</option>";
                        }
                        ?>
                    </select>

                    <a href="appo-manage.php" class="btn btn-outline-warning text-success">Cancel</a>
                    <button type="submit" class="btn btn-success text-warning px-5"
                        name="btn_update_appo">Update</button>
                </form>
            </div>
        </div>
    </main>

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-warning">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>
</html>