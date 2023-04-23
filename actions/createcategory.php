<?php
session_start();
require "../classes/admin.php";

$admin= new Admin;

if(isset($_POST['btn_create'])){
     $category_name=$_POST['category_name'];
     
    $admin->createCategory($category_name);

}



?>