<?php
session_start();
include "../classes/user.php";
$user = new User;

$customer_id = $_POST['customer_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$mobile_number = $_POST['mobile'];
$address = $_POST['address'];
$image_name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$password = $_POST['password'];
$passwordconf = $_POST['passwordconf'];

if ($password == $passwordconf) {
    if ($user->correctPassword($_SESSION['account_id'], $password)) {
        // echo "Password is correct.";
        $user->updateUser($customer_id, $first_name, $last_name, $username, $email, $mobile_number, $address, $password, $image_name, $tmp_name);
    } else {
        echo "The password is incorrect.";
    }

} else {
    echo "Password and Confirm Password do not match.";

}