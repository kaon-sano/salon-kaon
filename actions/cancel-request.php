<?php

session_start();
include "../classes/user.php";

$status=$_POST['status'];
$appointment_id=$_POST['appointment_id'];

$user = new User;
$user->sendCancelrequest($appointment_id,$status);

?>