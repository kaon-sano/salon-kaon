<?php
session_start();

require "../classes/admin.php";
$edit_working_hour = new Admin;
$edit=$edit_working_hour->viewSalarydetail($_GET['salary_id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit working hour</title>
    <!-- css link -->
    <!-- <link href="../assets/css/styles.css" rel="stylesheet" /> -->
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
        <div class="card w-25 mx-auto mb-5 mt-5">
            <div class="card-header card-service bg-dark text-warning">
                <h2 class="card-title h3 mb-0">Edit Working hour</h2>
            </div>
            <div class="card-body">
                <form action="../actions/edit-workinghour.php" method="post">

                    <div class="mb-3 mt-3">
                        <h4>Salary ID : <?=$edit['salary_id']?></h4>
                    </div>
                    <div class="mb-3 mt-3">
                        <h4>Month : <?=$edit['month']?></h4>
                    </div>
                    <div class="mb-3 mt-3">
                        <h4>Staff Name : <?=$edit['first_name']?> <?=$edit['last_name']?></h4>
                    </div>

                    <div class="mb-3 mt-3">
                       
                    <input type="hidden" name="salary_id" id="salary_id" class="form-control" value="<?=$edit['salary_id']?>"
                            required>
                     
                        <label for="">Regular Hour</label>
                        <input type="number" name="regular_hour" id="regular_hour" class="form-control" value="<?=$edit['regular_hour']?>"
                            required>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="">Overtime Hour</label>
                        <input type="number" name="overtime" id="overtime" class="form-control" value="<?=$edit['over_time']?>" required>
                    </div>
                    
                    <div class="mb-3 mt-3">
                        <input type="hidden" name="gross_income" id="gross_income" class="form-control" value="<?=$edit['gross_income']?>" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="hidden" name="net_income" id="net_income" class="form-control" value="<?=$edit['net_income']?>" required>
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="hidden" name="account_id" id="account_id" class="form-control" value="<?=$edit['account_id']?>" required>
                    </div>

                    <a href="salary.php" class="btn btn-outline-warning text-dark">Cancel</a>
                    <button type="submit" class="btn btn-dark text-warning px-5" name="btn_edit">Edit</button>
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