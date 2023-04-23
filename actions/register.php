<?php

include "../classes/user.php";

$password=$_POST['password'];
$passwordconf=$_POST['passwordconf'];

$user= new User;


if ($password == $passwordconf) {
    $user->register();
}else{
    echo"<p class='text-danger'>'The password is incorrect'</p>";
}


?>