<?php

session_start();
require "../classes/admin.php";
$staff_edit = new Admin;
$staff_info = $staff_edit->getStaff($_GET['staff_id']);
// print_r($staff_info);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
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

    <div class="container">
        <div class="display-6 p-4"><i class="fa-solid fa-user"></i> Staff</div>
    </div>


    <div class="card mx-auto w-50 mt-5">
        <div class="card mx-auto">
            <div class="card-body" style="background-color:#efe2ef;">
                <form action="../actions/update-staff.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                <input type="hidden" name="staff_id" id="staff_id" value="<?=$staff_info['staff_id']?>" class="form-control">
                
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">First Name</label>
                                        <input type="text" name="first_name" id="firstname"
                                            class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                            value="<?=$staff_info['first_name']?>"placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col ps-1">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" id="lastname"
                                            value="<?=$staff_info['last_name']?>"class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                 <label for="" class="form-label">Username</label>
                                 <input type="text" name="username" id="username"
                                     value="<?=$staff_info['username']?>"class="form-control border-top-0 border-end-0 border-start-0 border-1 border-dark rounded-0"
                                     placeholder="Username">
                                </div>
         
                                 <div class="col-8">
                                     <p>Position</p>
                                     <div class="form-check form-check-inline">
                                         <input type="radio" name="position" value="Master" 
                                         <?php
                                         if($staff_info['position']=="Master"){
                                            echo"checked";
                                         }
                                         ?>
                                         id="master" class="form-check-input">
                                         <label for="" class="form-check-lable">Master</label>
                                     </div>
         
                                     <div class="form-check form-check-inline">
                                         <input type="radio" name="position" value="Expert" 
                                         <?php
                                         if($staff_info['position']=="Expert"){
                                            echo"checked";
                                         }
                                         ?>
                                         id="expert" class="form-check-input">
                                         <label for="" class="form-check-lable">Expert</label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                            <input type="radio" name="position" value="Staff"
                                         <?php
                                         if($staff_info['position']=="Staff"){
                                            echo"checked";
                                         }
                                         ?>
                                         id="staff" class="form-check-input">
                                         <label for="" class="form-check-lable">Staff</label>
                                     </div>
                                 </div>
                             </div>

                            <div class="row">
                                <div class="col">
                                <p>Employment Status</p>
                                <div class="form-check form-check-inline" required>
                                <input type="radio" name="employment_status" value="Full_Time"
                                <?php
                                    if($staff_info['employment_status']=="Full_Time"){
                                    echo"checked";
                                 }
                                ?>
                               
                                    id="master"
                                    class="form-check-input">
                                <label for="" class="form-check-lable">Full-Time</label>
                                </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="employment_status" value="Part_Time"
                                <?php
                                    if($staff_info['employment_status']=="Part_Time"){
                                    echo"checked";
                                 }
                                ?>
                                id="part_time"
                                    class="form-check-input">
                                <label for="" class="form-check-lable">Part-Time</label>
                            </div>
                            <br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="employment_status" value="Contractual" 
                                
                                <?php
                                    if($staff_info['employment_status']=="Contractual"){
                                    echo"checked";
                                 }
                                ?>
                                id="contractual"
                                    class="form-check-input">
                                <label for="" class="form-check-lable">Contractual</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input type="radio" name="employment_status" value="Probational" 
                                
                                <?php
                                    if($staff_info['employment_status']=="Probational"){
                                    echo"checked";
                                 }
                                ?>

                                id="probational"
                                class="form-check-input">
                                <label for="" class="form-check-lable">Probational</label>
                            </div>
                        </div>

                        <div class="col">

                            <p>Civil status</p>
                            <div class="form-check form-check-inline" required>
                                <input type="radio" name="civil_status" value="Single"
                                <?php
                                if($staff_info['civil_status']=="Single"){
                                            echo"checked";
                                }
                                         ?>
                                id="Single"
                                    class="form-check-input">
                                <label for="" class="form-check-lable">Single</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="civil_status" value="Married" 
                                <?php
                                    if($staff_info['civil_status']=="Married"){
                                        echo"checked";
                                     }
                                ?>
                                
                                id="expert"
                                    class="form-check-input">
                                <label for="" class="form-check-lable">Married</label>
                            </div>

                        </div>
                    </div>

                            <textarea type="text" name="bio" id="bio" cols="3" rows="5" placeholder="bio"
                                value=""class="mb-3 form-control border-dark border-1 rounded-0"><?=$staff_info['bio']?></textarea>

                            <div class="mt-5">
                                <input type="submit" name="btn_edit_staff" value="UPDATE"
                                    class="mb-3 btn w-100 text-warning" style="background-color:#9370DB;">
                            </div>
                        </div>
                       
                        <div class="col-4">
                            <div class="card mx-auto my-5">
                                <img src="../assets/images/<?=$staff_info['photo']?>" alt="<?=$staff_info['photo']?>" class="card-img-top">
                                <div class="card-body">
                                    <input type="file" class="form-control mb-2" id="photo" accept="image/*" name="photo" optional>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                <div class="m-3 text-end"><a href="staff.php">Back To Staff Top</a></div>

            </div>
        </div>
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