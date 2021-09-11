<?php

class user
{
    public function __construct()
    {
        
    }

    public static function logOut()
    {

        if (isset($_COOKIE['user_id'])) {
            setcookie( 'user_id', "", time() - 3600, "/", "event.liamanderson.co.uk", true, true );
            session_destroy();
            return true;
        } else {
            session_destroy();
            return false;
        }

    }


    public static function checkUser()
    {


        if(!isset($_COOKIE['user_id']) && empty($_COOKIE['user_id'])) {
            header("Location: " . base_url(). '/login');
        } elseif(Users::resolveUserID() == false) {
            header("Location: " . base_url(). '/register');
        }

    }

    public static function checkEmailExists($email) {

        $sql = "SELECT * from `users` WHERE `email`=:a";
        $params = array(
            ':a'=>$email
        );

        $data = new DataAccess();
        $results = $data->Fetch($sql, $params);

        if (count($results) > 0) {
            return true;
        }
        return false;

    }

    public static function login($email, $password)
    {

        $sql = "SELECT * from `users` WHERE `email`=:a";
        $params = array(
            ':a'=>$email
        );

        $data = new DataAccess();
        $results = $data->Fetch($sql, $params);

        $json_return = array("response" => "invalid");

        $hash = Users::passwordHash();

        setcookie( 'user_id', $id, 1000, "/", "event.liamanderson.co.uk", true, true );
        setcookie( 'hash', $hash, 1000, "/", "event.liamanderson.co.uk", true, true );


    }

    public static function verifyEmail($email, $verify){


    }



    public static function register($email, $ref)
    {

    }
}