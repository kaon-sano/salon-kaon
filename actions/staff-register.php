<?php
session_start();
require "../classes/admin.php";

$password=$_POST['password'];
$passwordconf=$_POST['passwordconf'];

$admin = new Admin;

if ($password == $passwordconf) {
    $admin->registerStaff();
} else {
    echo "<p class='text-danger'>'The password is incorrect.'</p>";
}



?>