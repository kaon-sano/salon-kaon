<?php

session_start();
 

require "../classes/admin.php";
$category = new Admin;
$category_list= $category->getallCategory();

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


    <!-- <main class="container py-5"> -->




    <div class="mx-auto w-50 my-5">
        <form action="../actions/createcategory.php" method="post">
            <div class="row">
                <div class="col-4 text-end"><label for="" class="form-label">Add Categories</label></div>
                <div class="col-5"><input type="text" name="category_name" class="form-control"></div>
                <div class="col-3"><button type="submit" name="btn_create" class="btn btn-dark text-warning">ADD</button>
                </div>
            </div>
        </form>
    </div>


    <main class="container">
        
        <table class="table table-warning table-hover table-responsive-lg caption-top w-50 mt-5 mx-auto">
            <caption class="h3 text-muted text-center">Category List</caption>
            <thead>
                    <th class="text-dark text-center">CATEGORY ID</th>
                    <th class="text-dark">CATEGORY NAME</th>
                    <th class="text-dark"></th>
            </thead>
            <tbody>
                <?php
                   
                while ($category_row=$category_list->fetch_assoc()) {

                    ?>
                    <tr>
                        <td class="text-center">
                            <?= $category_row['category_id']?>
                        </td>
                        <td class="text-left">
                            <?= $category_row['category_name']?>
                        </td>


                        <td> <a href="edit-category.php?category_id=<?=$category_row['category_id']?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a href="delete-category.php?category_id=<?$category_row['category_id']?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </main>
    <!-- </main> -->

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