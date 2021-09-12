<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';

$email = $_POST["email"];
$password = $_POST["password"];

if(User::login($email, $password)){
    header("Location: /dashboard");
}else{
    header("Location: /login?login=failed");
}