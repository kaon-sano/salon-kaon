<?php

session_start();
require "../classes/admin.php";

$appointment_id=$_POST['appointment_id'];

$admin = new Admin;
$admin->deleteAppo($appointment_id);

?>