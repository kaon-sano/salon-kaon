<?php

session_start();
require "../classes/admin.php";

$salary_id=$_POST['salary_id'];
$regular_hour=$_POST['regular_hour'];
$over_time=$_POST['overtime'];
$gross_income=$_POST['gross_income'];
$net_income=$_POST['net_income'];
$account_id=$_POST['account_id'];

$admin= new Admin;
$admin->editWorkinghour($salary_id,$regular_hour,$over_time,$gross_income,$net_income,$account_id);



?>