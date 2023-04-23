<?php
session_start();

require "../classes/admin.php";
$customer = new Admin;
$customer_info = $customer->displayAllcustomer();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
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

    <div class="display-5 p-4"><i class="fa-solid fa-scissors"></i> Customer</div>

    <main class="container py-5">

        <h2 class="h3 text-muted">Customer List</h2>

        <div class="mt-5">
            <table class="table table-hover table-responsive-lg mt4" style="background-color:;">
                <thead class="thead-light">
                    <tr>
                        <th>#</th> <!--customer_id-->
                        <th>Photo</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th style="width: 95px;"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($customer_row = $customer_info->fetch_assoc()) {
                        // print_r($customer_row);
                        ?>

                        <tr>
                            <td>
                                <?= $customer_row['customer_id'] ?>
                            </td>
                            <td>
                                <?php
                                if ($customer_row['photo']) {
                                    ?>
                                    <img src="../assets/images/<?= $customer_row['photo'] ?>"
                                        alt="<?= $customer_row['photo'] ?>" style="width:100px; height:100px;">
                                    <?php
                                } else {
                                    ?>
                                    <i class="fa-solid fa-user text-secondary text-center customer-icon"style="font-size:5rem;"></i>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?= $customer_row['first_name'] ?>
                            </td>
                            <td>
                                <?= $customer_row['last_name'] ?>
                            </td>
                            <td>
                                <?= $customer_row['username'] ?>
                            </td>
                            <td>
                                <?= $customer_row['email'] ?>
                            </td>
                            <td>
                                <?= $customer_row['mobile_number'] ?>
                            </td>
                            <td>
                                <?= $customer_row['address'] ?>
                            </td>
                            <!-- <td>
                                <a href="" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td> -->
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-warning">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous">
    </script>

</body>
</html>