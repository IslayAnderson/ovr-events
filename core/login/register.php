<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

if(User::register($email, $username, $password)){
    header("Location: /login?newUser=success");
}else{
    header("Location: /register?newUser=failed");
}