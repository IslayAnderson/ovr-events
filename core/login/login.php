<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';

$email = $_POST["email"];
$password = $_POST["password"];

if(User::login($email, $password)){
    header("Location: /admin");
}else{
    header("Location: /login");
}