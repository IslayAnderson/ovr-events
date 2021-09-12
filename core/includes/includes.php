<?php
if($debug){
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
}
//interfaces
include_once __DIR__ . '/classes/DataAccess.php';

//classes
include_once __DIR__ . '/classes/User.php';
include_once __DIR__ . '/classes/Event.php';

//modules
if(!$nomod){
    include_once __DIR__ . '/modules/pages.php';
}

//globals
$current_user = new User($_COOKIE['user_id']);