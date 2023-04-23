<?php
session_start();
include "../classes/admin.php";
$admin = new Admin;


$staff_id = $_POST['staff_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$position = $_POST['position'];
$employment_status=$_POST['employment_status'];
$civil_status=$_POST['civil_status'];
$bio = $_POST['bio'];
$image_name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

$admin->updateStaff($staff_id, $first_name, $last_name, $username, $position, $employment_status,$civil_status,$bio, $image_name, $tmp_name);

?>