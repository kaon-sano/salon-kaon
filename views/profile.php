<?php

session_start();

require "../classes/user.php";
$user= new User;
$user_info=$user->getUser($_SESSION['account_id']);
// print_r($user_info);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
if($_SESSION['role'] == "C"){
    include 'customer-menu.php';
} else {
    include 'admin-menu.php';
}
?>

    <div class="container">
        <div class="display-6 p-4"><i class="fa-solid fa-user"></i> Profile</div>
    </div>


    <div class="card mx-auto w-50 mt-5">
        <div class="card">
            <div class="card-body" style="background-color:#efe2ef;">
                <form action="../actions/update-user.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                <input type="hidden" name="account_id" id="account_id" class="form-control"
                                value=<?=$_SESSION['account_id']?>>
                            </div>
                            <div>
                                <input type="hidden" name="customer_id" id="customer_id" class="form-control"
                                value=<?=$user_info['customer_id']?>>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">First Name</label>
                                        <input type="text" name="first_name" id="firstname"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0" value="<?=$user_info['first_name']?>"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" id="lastname"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0" value="<?=$user_info['last_name']?>"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Username</label>
                                        <input type="text" name="username" id="username"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0" value="<?=$user_info['username']?>"
                                            placeholder="Userame">
                                    </div>
                                </div>
                                <div class="col-7 ps-1">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0" value="<?=$user_info['email']?>"
                                            placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mobile Number</label>
                                        <input type="number" name="mobile" id="mobile"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"value="<?=$user_info['mobile_number']?>"
                                            placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Address</label>
                                        <input type="text" name="address" id="address"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0" value="<?=$user_info['address']?>"
                                            placeholder="Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col ms-2 ps-1">
                                    <div class="mb-3">
                                        <label for="" class="form-labeel">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="col ms-2 ps-1">
                                    <div class="mb-3">
                                        <label for="" class="form-labeel">Password Confirm</label>
                                        <input type="password" name="passwordconf" id="passwordconf"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                            placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <input type="submit" name="btn_edit_cus" value="UPDATE"
                                    class="mb-3 btn w-100 text-warning" style="background-color:#9370DB;">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card mx-auto my-5">
                                <img src="../assets/images/<?=$user_info['photo']?>" alt="<?=$user_info['photo']?>" class="card-img-top" accept="image/*" style="height:250px;">
                                <div class="card-body">
                                    <input type="file" class="form-control mb-2" id="photo" name="photo" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>