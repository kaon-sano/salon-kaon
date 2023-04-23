<?php

session_start();

require "../classes/admin.php";

$staff_salary = new Admin;
$staff_row = $staff_salary->displayStaffdata();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
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
    <div class="display-5 p-4"> <i class="fa-regular fa-folder-open"></i> Salary</div>

    <div class="container">



        <div class="card mx-auto w-50 mt-5 mb-5 bg-light">
            <div class="card-header bg-dark text-center">
                <div class="card-title text-warning">
                    <h2>Calculate Salary</h2>
                </div>
            </div>
            <!-- <div class="card mx-auto"> -->
            <div class="card-body">
                <form action="../actions/calculate-salary.php" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="row mb-3">
                            <div class="mt-2">
                                <label for="title" class="form-label small">Staff Name</label>
                                <select name="staff_id" id="staff_id" class="form-select mb-4" required>
                                    <option value="" hidden>Select Staff</option>
                                    <?php

                                    while ($staff_data = $staff_row->fetch_assoc()) {
                                        // print_r($staff_data);
                                        echo "<option value='" . $staff_data['staff_id'] . "'>" .
                                            $staff_data['first_name']." ". $staff_data['last_name']." </option>";
                                    }
                                    ?>
                                </select>
                            </div>

            
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-7">
                            <label for="title" class="form-label small">Month</label>
                            <select name="month" id="month" class="form-select mb-4" required>
                                <option value="" hidden>Select Month</option>
                                <option value="April">April</option>
                                <option value="MAY">May</option>
                                <option value="MAY">Jun</option>
                                <option value="MAY">July</option>
                                <option value="MAY">August</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Regular Hour</label>
                                <input type="number" name="regular_hour" id="regular_hour"
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0">
                            </div>
                        </div>
                        <div class="col ps-1">
                            <div class="mb-3">
                                <label for="" class="form-label">Over-time Hour</label>
                                <input type="number" name="overtime" id="overtime" value=""
                                    class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0">
                            </div>
                        </div>

                    </div>
                    <div class="mt-3">
                        <input type="submit" name="btn_salary" value="Calculate"
                            class="btn mb-3 btn-dark w-100 text-warning">
                    </div>
                </form>
            </div>
            <div class="text-end mb-3 mx-3"><a href="salary.php">Back To Salary
                    Top</a></div>
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