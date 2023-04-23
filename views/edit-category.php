<?php

session_start();
require "../classes/admin.php";

$edit_category = new Admin;
$category_info = $edit_category->getCategory($_GET['category_id']);
$category = $category_info->fetch_assoc();
// print_r($category);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
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
    <div class="display-5 p-4"> <i class="fa-regular fa-folder-open"></i> Category</div>


    <div class="mx-auto w-50 my-5">
        <form action="../actions/update-category.php" method="post">
            <div class="row">
                <div class="col-4 text-end"><label for="" class="form-label">Edit Category Name</label></div>
                <input type="hidden" name="category_id" class="form-control" value="<?= $category['category_id'] ?>">
                <div class="col-5"><input type="text" name="category_name" class="form-control"
                        value="<?= $category['category_name'] ?>"></div>
                <div class="col-3"><button type="submit" class="btn btn-warning text-dark"
                        name="btn_edit_ct">Edit!</button>
                </div>

            </div>
        </form>

        <div class="mt-5">
            <a href="categories.php" class="btn btn-outline-warning sm float-end">Cancel</a>
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