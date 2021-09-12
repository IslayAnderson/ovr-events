<?php
$nomod = true;
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
if(User::logOut()){
    header("Location: /login?logout=success");
}else{
    header("Location: /login?logout=failed");
}