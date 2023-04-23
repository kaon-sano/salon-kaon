<?php

session_start();
include "../classes/admin.php";

$status=$_POST['status'];
$staff_id=$_POST['staff_id'];
$appointment_id=$_POST['appointment_id'];

$admin = new Admin;
$admin->upDateappo($appointment_id,$status,$staff_id);


?>