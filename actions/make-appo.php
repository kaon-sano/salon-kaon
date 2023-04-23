<?php
session_start();
require "../classes/user.php";

$appointment_date = $_POST['appo_date'];
$appointment_time = $_POST['appo_time'];
$service_name = $_POST['service_name'];
$account_id = $_SESSION['account_id'];
$username = $_SESSION['username'];
$message = $_POST['message'];

$user=new User;
$user->makeAppo($appointment_date,$appointment_time,$service_name,$username,$message, $account_id);

?>