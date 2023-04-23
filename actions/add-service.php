<?php
session_start();
require "../classes/admin.php";

$admin = new Admin;

$service_name = $_POST['service_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];

$admin->createService($service_name, $description, $price, $category_id);

?>