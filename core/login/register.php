<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

if(json_decode(User::register($email, $username, $password))->auth == 'success'){
    header("Location: /login?newUser=success");
}else{
    header("Location: /register?newUser=failed");
}