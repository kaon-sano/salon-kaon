<?php

session_start();
require "../classes/admin.php";

$staff = new Admin;
$staff_list = $staff->displayStafflist();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
    <!-- css link -->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <!-- Bootstrap -->
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

    <div class="display-5 m-2 p-4"><i class="fa-solid fa-id-card"></i> Staff</div>

    <div class="card mx-auto w-50 mt-2">
        <form action="../actions/staff-register.php" method="post">
            <div class="card-header border-0" style="background-color:#9370DB;">
                <h1 class="text-warning text-center">Add Staff</h1>
            </div>
            <div class="card mx-auto">
                <div class="card-body" style="background-color:#efe2ef;">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="firstname"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col ps-1">
                            <div class="mb-3">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="lastname"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" id="username"
                                class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                placeholder="Username" required>
                        </div>
                        <div class="col">
                            <p>Civil status</p>
                            <div class="form-check form-check-inline" >
                                <input type="radio" name="civil_status" value="Single" id="single"
                                    class="form-check-input" required>
                                <label for="" class="form-check-lable">Single</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="civil_status" value="Married" id="expert"
                                    class="form-check-input">
                                <label for="" class="form-check-lable">Married</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <p>Employment Status</p>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="employment_status" value="Full_Time" id="full_time"
                                    class="form-check-input" required>
                                <label for="" class="form-check-lable">Full-Time</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="employment_status" value="Part_Time" id="part_time"
                                    class="form-check-input">
                                <label for="" class="form-check-lable" required>Part-Time</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="employment_status" value="Contractual" id="contractual"
                                    class="form-check-input">
                                <label for="" class="form-check-lable" required>Contractual</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input type="radio" name="employment_status" value="Probational" id="probational"
                                    class="form-check-input">
                                <label for="" class="form-check-lable">Probational</label>
                            </div>
                        </div>

                        <div class="col">
                            <p>Position</p>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="position" value="Master" id="master" class="form-check-input" required>
                                <label for="" class="form-check-lable">Master</label>
                            </div>

                            <div class="form-check form-check-inline" required>
                                <input type="radio" name="position" value="Expert" id="expert" class="form-check-input">
                                <label for="" class="form-check-lable">Expert</label>
                            </div>
                            <div class="form-check form-check-inline" required>
                                <input type="radio" name="position" value="Staff" id="staff" class="form-check-input">
                                <label for="" class="form-check-lable">Staff</label>
                            </div>
                        </div>
                    </div>

                    <textarea name="bio" id="bio" cols="3" rows="5" placeholder="Bio"
                        class="mb-3 form-control border-dark border-1 rounded-0" required></textarea>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-labeel">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                     placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col ps-1">
                            <div class="mb-3">
                                <label for="" class="form-labeel">Confirm Password</label>
                                <input type="password" name="passwordconf" id="passwordconf"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                    placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <input type="submit" name="btn_staff" value="GO !" class="btn w-100 text-warning"
                            style="background-color:#9370DB;">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <h2 class="h3 text-muted">Staff List</h2>
        <div class="table table-border table-responsive mt-5">
            <table class="table table-hover mt4">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="5%">Staff ID</th> <!--staff id-->
                        <th scope="col" width="10%">photo</th>
                        <th scope="col" width="10%">First Name</th>
                        <th scope="co" width="10%">Last Name</th>
                        <th scope="col" width="10%">Position</th>
                        <th scope="col" width="55%">Bio</th>
                        <th scope="col" style="width: 95px;"></th> <!--for action button-->
                        <th></th> <!--for salary button-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($staff_row = $staff_list->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <?= $staff_row['staff_id'] ?>
                            </td>
                            <td>
                                <?php
                                if ($staff_row['photo']) {
                                    ?>
                                    <img src="../assets/images/<?= $staff_row['photo'] ?>" alt="<?= $staff_row['photo'] ?>"
                                        style="width:100px; height:100px;">
                                    <?php
                                } else {
                                    ?>
                                    <i class="fa-solid fa-face-smile text-center dashboard-icon"></i>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?= $staff_row['first_name'] ?>
                            </td>
                            <td>
                                <?= $staff_row['last_name'] ?>
                            </td>
                            <td>
                                <?= $staff_row['position'] ?>
                            </td>
                            <td>
                                <?= $staff_row['bio'] ?>
                            </td>
                            <td>
                                <a href="edit-staff.php?staff_id=<?= $staff_row['staff_id'] ?>"
                                    class="btn btn-outline-danger btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <!-- <a href="delete-staff.php?staff_id=<$staff_row['staff_id'] ?>"
                                    class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                            </td>

                            <!-- <td>
                                <a href="calculate-salary.php?staff_id=<$staff_row['staff_id'] ?>"
                                    class="btn btn-dark text-warning btn-sm mt-2">Calculate Salary</a>
                            </td> -->
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-warning">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

</body>

</html>