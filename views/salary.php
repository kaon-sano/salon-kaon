<?php

session_start();

require "../classes/admin.php";

$staff_salary = new Admin;
$salary_data=$staff_salary->getSalaryinfo();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    <!-- <div class="row"> -->
    <div class="display-5 p-4"> <i class="fa-regular fa-folder-open"></i> Salary</div>
    <!-- <div class="m-2 col-6"><a href="calculate-salary.php" class="btn btn-dark text-warining">Caltulate Salary</a></div>
   </div> -->

    <div class="container">
        <div class="m-2 float-end"><a href="calculate-salary.php" class="btn btn-dark text-warning btn_block">Caltulate
                Salary</a>
        </div>

        <div class="row">
            <h5>Tax Deduction:depending on Civil Status</h5>
            <h5>Health Insurance Deduction: $200</h5>
            <div class="col-4">
                <table class="table table-hover table-responsive caption-top" style="background-color: #efe2ef;">
                    <caption class="h6 text-info">Tax Deduction : Single</caption>

                    <tr>
                        <td>
                            Gross Income
                            >$1000 </td>
                        <td>4%</td>
                    </tr>
                    <tr>
                        <td>
                            Gross Income
                            <=$1000 </td>
                        <td>N/A</td>
                    </tr>
                </table>
            </div>

            <div class="col-4 ms-5">
                <table class="table table-hover table-responsive-lg mt4 caption-top" style="background-color: #efe2ef;">
                    <caption class="h6 text-info">Tax Deduction : Married</caption>

                    <tr>
                        <td>
                            Gross Income
                            >$1600 </td>
                        <td>2%</td>
                    </tr>
                    <tr>
                        <td>
                            Gross Income
                            <=$1600 </td>
                        <td>N/A</td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="row mt-5">
            <h5>Gross Income</h5>
            <div class="col-5">
                <table class="table table-hover table-responsive caption-top" style="background-color: #efe2ef;">
                    <caption class="h6 text-muted">
                        <div class="text-primary">Reluar Pay (Per hour)</div> <br>
                        Position: Master, Expert and Staff <br>
                        Employment Status: Probationary, Contractual,Part-time,Full-time
                    </caption>
                    <tr>
                        <th></th>
                        <th>Probationary</th>
                        <th>Contractual</th>
                        <th>Part-time</th>
                        <th>Full-time</th>
                    </tr>
                    <tr>
                        <td>Master</td>
                        <td>$16</td>
                        <td>$19</td>
                        <td>$25</td>
                        <td>$30</td>
                    </tr>
                    <tr>
                        <td>Expert</td>
                        <td>$10</td>
                        <td>$15</td>
                        <td>$20</td>
                        <td>$25</td>
                    </tr>
                    <tr>
                        <td>Staff</td>
                        <td>$8</td>
                        <td>$12</td>
                        <td>$14</td>
                        <td>$18</td>
                    </tr>
                </table>
            </div>

            <div class="col-5 ms-5">
                <table class="table table-hover table-responsive caption-top" style="background-color: #efe2ef;">
                    <caption class="h6 text-muted">
                        <div class="text-primary">Overtime Pay (Per hour)</div> <br>
                        Position: Master, Expert and Staff <br>
                        Employment Status: Probationary, Contractual,Part-time,Full-time
                    </caption>
                    <tr>
                        <th></th>
                        <th>Probationary</th>
                        <th>Contractual</th>
                        <th>Part-time</th>
                        <th>Full-time</th>
                    </tr>
                    <tr>
                        <td>Master</td>
                        <td>$22</td>
                        <td>$23</td>
                        <td>$31</td>
                        <td>$37</td>
                    </tr>
                    <tr>
                        <td>Expert</td>
                        <td>$12</td>
                        <td>$18</td>
                        <td>$25</td>
                        <td>$31</td>
                    </tr>
                    <tr>
                        <td>Staff</td>
                        <td>$10</td>
                        <td>$15</td>
                        <td>$17</td>
                        <td>$22</td>
                    </tr>
                </table>
            </div>
        </div>

        <table class="table table-hover table-warning table-responsive caption-top mt-5 mb-5 bg-light">
            <caption class="h5 text-dark">Staff Salary</caption>

            <thead>
                <tr>
                    <th>Saraly ID</th>
                    <th>Month</th>
                    <th>Staff Name</th>
                    <th>Position</th>
                    <th>Employment Status</th>
                    <th>Civil Status</th>
                    <th>Gross Income</th>
                    <th>Net Income</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                  while($salary_row=$salary_data->fetch_assoc()){
                    ?>
        
                <tr>
                    <td class="text-center"><?=$salary_row['salary_id']?></td>
                    <td><?=$salary_row['month']?></td>
                    <td><?=$salary_row['first_name']?> <?=$salary_row['last_name']?></td>
                    <td><?=$salary_row['position']?></td>
                    <td><?=$salary_row['employment_status']?></td>
                    <td><?=$salary_row['civil_status']?></td>
                    <td class="text-center">$<?=$salary_row['gross_income']?></td>
                    <td class="text-center">$<?=$salary_row['net_income']?></td>
                    <td><a href="view-salary-calculation.php?salary_id=<?=$salary_row['salary_id']?>"class="btn btn-dark text-warning">View Calculation</a></td>
                    <td><a href="edit-workinghour.php?salary_id=<?=$salary_row['salary_id']?>"class="btn btn-warning text-dark">Edit Working Hour</a></td>
                </tr>
                <?php
                  }
                  ?>
            </tbody>

        </table>

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