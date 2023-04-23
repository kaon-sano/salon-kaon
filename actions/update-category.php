<?php

session_start();
include "../classes/admin.php";
$admin = new Admin;

$category_id=$_POST['category_id'];
$category_name=$_POST['category_name'];

$admin->updateCategory($category_id,$category_name);

?>
