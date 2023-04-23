<?php
session_start();

require "../classes/admin.php";
$edit_service = new Admin;
$service_info = $edit_service->getService($_GET['service_id']);
$category_detail = $edit_service->getallCategory();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Services</title>
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
        <div class="card w-25 mx-auto mb-5">
            <div class="card-header card-service bg-dark text-warning">
                <h2 class="card-title h3 mb-0">Edit Service</h2>
            </div>
            <div class="card-body">
                <form action="../actions/edit-service.php" method="post">
                    <input type="hidden" name="service_id" value="<?= $service_info['service_id'] ?>" required
                        autofocus>

                    <label for="title" class="form-label small">Service Name</label>
                    <input type="text" name="service_name" id="service_name" class="form-control mb-4"
                        value="<?= $service_info['service_name'] ?>">
                    <label for="title" class="form-label small">Description</label>
                    <textarea type="text" name="description" id="description" class="form-control mb-4"
                        required><?= $service_info['description'] ?></textarea>
                    Price
                    <div class="mb-3 input-group">
                        <label for="" class="input-group-text">$</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="<?= $service_info['price'] ?>" required>

                    </div>


                    <label for="title" class="form-label small">Category</label>
                    <select name="category_name" id="category_name" class="form-select mb-4" required>
                        <option value="" hidden>Select Category</option>
                        <?php

                        while ($category_output = $category_detail->fetch_assoc()) {
                            echo "<option value='" . $category_output['category_id'] . "'>" .
                                $category_output['category_name'] . "</option>";
                        }
                        ?>

                    </select>

                    <a href="services.php" class="btn btn-outline-warning text-dark">Cancel</a>
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