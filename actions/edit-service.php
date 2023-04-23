<?php
 session_start();
 require "../classes/admin.php";

 

$admin= new Admin;

// if(isset($_POST['btn_edit'])){
    
    $service_id=$_POST['service_id'];
    $service_name=$_POST['service_name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category_name=$_POST['category_name'];
    
   $admin->updateService($service_id,$service_name,$description,$price,$category_name);

// }


?>

