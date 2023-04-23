<?php

session_start();
require "../classes/admin.php";

$salary_detail = new Admin;
$detail = $salary_detail->viewSalarydetail($_GET['salary_id']);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View saraly-calculation</title>
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

    <main class="container">


        <!-- <h2 class="h3 text-muted">Salary Detail</h2> -->

        <div class="m-4 mb-5">
            <table class="table table-hover table-responsive mt-3 mx-5 my-5 caption-top" style="width:500px;">
                <caption>
                    <h2 class="h3 text-muted">Salary Detail  <a href="salary.php" class="btn btn-dark text-warning float-end">Back to Salay Top</a></h2>
                </caption>
                <thead>
                    <tr>
                        <th scope="col" style="width:40%;"></th>
                        <th scope="col" style="width:50%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Salary ID</td>
                        <td class="h5 px-5 py-3">
                            <?= $detail['salary_id'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Month</td>
                        <td class="h5 px-5 py-3">
                            <?= $detail['month'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Staff Name</td><!--full name-->
                        <td class="h5 px-5 py-3">
                            <?= $detail['first_name'] ?>
                            <?= $detail['last_name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Position</td>
                        <td class="h5 px-5 py-3">
                            <?= $detail['position'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Employmeny Status</td>
                        <td class="h5 px-5 py-3">
                            <?= $detail['employment_status'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Civil Status</td>
                        <td class="h5 px-5 py-3">
                            <?= $detail['civil_status'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Regular hour</td>
                        <td class="h5 px-5 py-3">
                            <?= $detail['regular_hour'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Overtime hour</td>
                        <td class="h5 px-5 py-3">
                            <?= $detail['over_time'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Gross Income</td>
                        <td class="h5 px-5 py-3">
                            $
                            <?= $detail['gross_income'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-dark text-warning p-3 h5">Net Income</td>
                        <td class="h5 px-5 py-3">
                            $
                            <?= $detail['net_income'] ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3 mx-5">
                <div class="h4 text-danger">Calcuration Formula</div>
                <div class="h4 mt-3">Gross Income =
                    <?= $detail['regular_hour'] ?>(Regular hour) *
                    <?php

                    if ($detail['position'] == "Master") {
                        if ($detail['employment_status'] == "Full_Time") {
                            echo "$30";
                        } elseif ($detail['employment_status'] == "Part_Time") {
                            echo "$25";
                        } elseif ($detail['employment_status'] == "Contractual") {
                            echo "$19";
                        } elseif ($detail['employment_status'] == "Probational") {
                            echo "$16";
                        }

                    } elseif ($detail['position'] == "Expert") {
                        if ($detail['employment_status'] == "Full_Time") {
                            echo "$25";
                        } elseif ($detail['employment_status'] == "Part_Time") {
                            echo "$20";
                        } elseif ($detail['employment_status'] == "Contractual") {
                            echo "$15";
                        } elseif ($detail['employment_status'] == "Probational") {
                            echo "$10";
                        }

                    } elseif ($detail['position'] == "Staff") {
                        if ($detail['employment_status'] == "Full_Time") {
                            echo "$18";
                        } elseif ($detail['employment_status'] == "Part_Time") {
                            echo "$14";
                        } elseif ($staff['employment_status'] == "Contractual") {
                            echo "$12";
                        } elseif ($staff['employment_status'] == "Probational") {
                            echo "$8";
                        }
                    }

                    ?>(Payrate/hr) +
                    <?= $detail['over_time'] ?>(Overtime hour) *

                    <?php

                    if ($detail['position'] == "Master") {
                        if ($detail['employment_status'] == "Full_Time") {
                            echo "$37";
                        } elseif ($detail['employment_status'] == "Part_Time") {
                            echo "$31";
                        } elseif ($detail['employment_status'] == "Contractual") {
                            echo "$23";
                        } elseif ($detail['employment_status'] == "Probational") {
                            echo "$22";
                        }

                    } elseif ($detail['position'] == "Expert") {
                        if ($detail['employment_status'] == "Full_Time") {
                            echo "$31";
                        } elseif ($detail['employment_status'] == "Part_Time") {
                            echo "$25";
                        } elseif ($detail['employment_status'] == "Contractual") {
                            echo "$18";
                        } elseif ($detail['employment_status'] == "Probational") {
                            echo "$12";
                        }

                    } elseif ($detail['position'] == "Staff") {
                        if ($detail['employment_status'] == "Full_Time") {
                            echo "$22";
                        } elseif ($detail['employment_status'] == "Part_Time") {
                            echo "$17";
                        } elseif ($staff['employment_status'] == "Contractual") {
                            echo "$15";
                        } elseif ($staff['employment_status'] == "Probational") {
                            echo "$10";
                        }
                    }
                    ?>(Payrate/hr)
                </div><!--end of grossincome-->

                <div class="h4 mt-3"><h4>Net Income = Gross Income - Tax(%)
                    <?php

                    if ($detail['civil_status'] == "Married") {
                        if ($detail['gross_income'] > 1600) {
                            echo"2%.";
                        } else {
                            echo" N/A";
                        }
                    
                    }elseif($detail['civil_status'] == "Single") {
                        if ( $detail['gross_income'] > 1000) {
                           echo" 4%";
                        } else {
                            echo" N/A";
                        }
                    }
                    ?> - Health Insurance $200
                </div><!--end of netincome-->
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