<?php

session_start();

require "../classes/admin.php";
$admin = new Admin;
$category_list = $admin->getallCategory();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
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

    <main class="py-5">
        <div class="card w-50 mx-auto mb-5">
            <div class="card-header bg-danger text-warning">
                <h2 class="h4 mb-0">Add New Service</h2>
            </div>
            <div class="card-body" style="background-color:#FFF0F5;">
                <form action="../actions/add-service.php" method="post">
                    <label for="title" class="form-label small">Service Name</label>
                    <input type="text" name="service_name" id="service_name" class="form-control mb-4 " required>
                    <label for="title" class="form-label small">Description</label>
                    <textarea type="text" name="description" id="description" class="form-control mb-4"
                        required></textarea>
                    Price
                    <div class="mb-3 input-group">
                        <label for="" class="input-group-text">$</label>
                        <input type="number" name="price" id="price" class="form-control" required>

                    </div>


                    <label for="title" class="form-label small">Service Category</label>
                    <select type="text" name="category_id" id="category_id" class="form-select mb-4" required>
                        <option value="" hidden>Select Category</option>

                        <?php
                        while ($category_row = $category_list->fetch_assoc()) {
                            echo "<option value='" . $category_row['category_id'] . "'>" .
                                $category_row['category_name'] . "</option>";
                        }
                        ?>

                    </select>

                    <a href="services.php" class="btn btn-outline-danger">Cancel</a>
                    <button type="submit" class="btn btn-danger text-warning px-5" name="btn_add_srv">Add</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/bae9ba9f08.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>