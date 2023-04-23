<?php

session_start();

require "../classes/admin.php";
$service = new Admin;
$service_list=$service->displayAllservices();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- css link -->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <!---- Bootstrap -->
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

    <div class="display-5 p-4"><i class="fa-solid fa-scissors"></i> Services</div>


    <main class="container py-5">
        <a href="categories.php" class="btn btn-warning text-dark float-end me-2">Add New Category</a>
        <a href="add-service.php" class="btn btn-dark text-warning float-end me-2">Add New Service</a>


        <h2 class="h3 text-muted">Service List</h2>

        <div class="mt-5">
            <table class="table table-hover table-responsive-lg mt4">
                <thead class="thead-light">
                    <tr>
                        <th>#</th> <!--service_id-->
                        <th>Service Name</th>
                        <th>DESCRIPTION</th>
                        <th>PRICE</th>
                        <th>Category</th>
                        <th style="width: 95px;"></th> <!--for action button-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($service_row=$service_list->fetch_assoc()){
                        // print_r($service_row);
                        ?>
                    
                    <tr>
                        <td><?=$service_row['service_id']?></td>
                        <td><?=$service_row['service_name']?></td>
                        <td><?=$service_row['description']?></td>
                        <td>$ <?=$service_row['price']?></td>
                        <td><?=$service_row['category_name']?></td>
                        <td>
                            <a href="edit-services.php?service_id=<?=$service_row['service_id']?>" class="btn btn-dark text-warning ">Edit</a>
                            <!-- <a href="" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                        </td>
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
        crossorigin="anonymous"></script>

</body>

</html>