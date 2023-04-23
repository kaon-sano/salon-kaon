<?php

session_start();
require "../classes/admin.php";

$admin = new Admin;


$staff_id = $_POST['staff_id'];
$month = $_POST['month'];
$regular_hour = $_POST['regular_hour'];
$over_time = $_POST['overtime'];

$staff = $admin->getData($staff_id);

$admin->getSalary($regular_hour,$over_time,$month,$staff['account_id']);

echo"<hr>$staff_id,$month,$regular_hour,$over_time";
print_r($staff);
print_r($staff['employment_status']);
echo"<br>";
print_r($staff['position']);
echo"<br>";
print_r($staff['civil_status']);

// if ($staff['position'] == "Master") {
//         if ($staff['employment_status'] == "Full_Time") {
//         $gross_income = $regular_hour * 30 + $over_time * 37;
//         return $gross_income;
//     } elseif ($staff['employment_status'] == "Part_Time") {
//         $gross_income = $regular_hour * 25 + $over_time * 31;
//         return $grossincome;
//     } elseif ($staff['employment_status'] == "Contractual") {
//         $gross_income = $regular_hour * '19' + $over_time * 23;
//         return $grossincome;
//     } elseif ($staff['employment_status'] == "Probitional") {
//         $gross_income = $regular_hour * 16 + $over_time * 22;
//         return $gross_income;
//     }

// } elseif ($staff['position'] == "Expert") {
//     if ($staff['employment_status'] == "Full_Time") {
//         $gross_income = $regular_hour * 20 + $over_time * 24;
//         return $gross_income;
//     } elseif ($staff['employment_status'] == "Part_Time") {
//         $gross_income = $regular_hour * 20 + $over_time * 25;
//         return $gross_income;
//     } elseif ($staff['employment_status'] == " Contractual") {
//         $gross_income = $regular_hour * 15 + $over_time * 18;
//         return $gross_income;
//     } elseif ($staff['employment_status'] == "Probitional") {
//         $gross_income = $regular_hour * 10 + $over_time * 12;
//         return $gross_income;
//     }

// } elseif ($staff['position'] == "Staff") {
//     if ($staff['employment_status'] == "Full_Time") {
//         $gross_income = $regular_hour * 18 + $over_time * 22;
//         return $gross_income;
//     } elseif ($staff['employment_status'] == "Part_Time") {
//         $gross_income = $regular_hour * 14 + $over_time * 17;
//         // return $gross_income;
//     } elseif ($staff['employment_status'] == " Contractual") {
//         $gross_income = $regular_hour * 12 + $over_time * 15;
//         return $gross_income;
//     } elseif ($staff['employment_status'] == "Probitional") {
//         $gross_income = $regular_hour * 8 + $over_time * 10;
//         return $gross_income;
//     }
// }


// if ($staff['civil_status'] == "Married") {
//     if ($gross_income > 1600) {
//         $net_income = $gross_income * 0.98;
//         return $net_income;
//     } else {
//         return $gross_income;
//     }

// }elseif($staff['civil_status'] == "Married") {
//     if ($gross_income > 1000) {
//         $net_income = $gross_income * 0.94;
//         return $net_income;
//     } else {
//         return $gross_income;
//     }


// }

// $admin->getSalary($regular_hour, $over_time, $net_income, $gross_income, $month, $account_id);


?>