<?php
require "../classes/user.php";
session_start();

$user = new User;
$appo_cancel=$user->getAppoforcancel($_GET['appointment_id'])


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel</title>
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

<body class="d-flex flex-column min-vh-100">
    <?php
    if ($_SESSION['role'] == "C") {
        include 'customer-menu.php';
    } else {
        include 'admin-menu.php';
    }
    ?>

    <main class="container py-5">
        <form action="../actions/cancel-request.php" method="post" class="">
            <div class="card w-50 mx-auto m-5">
                <div class="card-header text-light bg-info display-6 text-center fw-bold">
                    Cancel Request Form
                </div>
                <div class="card-body text-info bg-light">
                    <!-- <h3 class="text-center">Appointment Detail</h3> -->
                    <br>
                    <div class="m-4">
                        <h4>Appointment ID : <sapn class="text-dark"><?=$appo_cancel['id']?></span></h4>
                    </div>
                    <div class="m-4">
                        <h4>Username : <sapn class="text-dark"><?=$appo_cancel['name']?></sapn></h4>
                    </div>
                    <div class="m-4">
                        <h4>Appointment Date : <sapn class="text-dark"><?=$appo_cancel['date']?></sapn></h4>
                    </div>
                    <div class="m-4">
                        <h4>Appointment time : <sapn class="text-dark"><?=$appo_cancel['time']?></sapn></h4>
                    </div>
                    <div class="mt-4 mx-4">
                        <h4>Service : <sapn class="text-dark"><?=$appo_cancel['service']?></sapn></h4>
                    </div>


                    <input type="hidden" name="appointment_id" value="<?=$appo_cancel['id']?>" required>
                    <input type="hidden" name="status"  value="Cancel"id="status" class="form-select mb-4" required>
               
             
                    <br>
                    <br>
                    <h4 class="text-center">
                        Are you sure to cancle your appointment?
                    </h4>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn mt-3 btn-info text-white fw-bold w-100">YES</button> 
                        </div>
                        <div class="col">
                        <a href="view-myappo.php" class="btn mt-3 btn-outline-info fw-bold w-100">NO</a> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>


    <?php
if($_SESSION['role'] == "C"){
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>


</body>
</html>