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


    public static function login($email, $password)
    {

        $sql = "SELECT * from `users` WHERE `email`=:a";
        $params = array(
            ':a'=>$email
        );

        $data = new DataAccess();
        $results = $data->Fetch($sql, $params);

        if (password_verify($password, $results[0]->password)) {
            $_COOKIE['user_id'] = $results->id;
            $hash = User::hash();
            setcookie( 'user_id', $results->id, 1000, "/", "event.liamanderson.co.uk", true, true );
            setcookie( 'hash', $hash, 1000, "/", "event.liamanderson.co.uk", true, true );
            return true;
        }else{
            User::logOut();
            return false;
        }


    }

    public static function register($email, $username, $password)
    {
        $sql = "INSERT INTO `users`(`username`, `password`, `email`) VALUES (:c,:b,:a)";
        $params = array(
            ':a'=>$email,
            ':b'=>password_hash($password, PASSWORD_DEFAULT),
            ':c'=>$username,
        );

        $data = new DataAccess();
        $results = $data->Fetch($sql, $params);
    }

    public static function checkUser()
    {
        $sql = "SELECT * from `users` WHERE id=:a and hash=:b";
        $params = array(
            ':a'=>$_COOKIE['user_id'],
            ':b'=>$_COOKIE['hash']
        );

        $data = new DataAccess();
        $results = $data->Fetch($sql, $params);

        if($results[0]){
            return json_encode(array('auth'=>'success'));
        } else{
            User::newHash($_COOKIE['user_id']);
            return json_encode(array('auth'=>'fail'));
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

    public static function hash(){
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen( $characters );
        $password     = '';
        $length           = 10;

        for ( $i = 0; $i < $length; $i ++ ) {
            $password .= $characters[ rand( 0, $charactersLength - 1 ) ];
        }

        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function newHash($id){
        $sql = "INSERT INTO `users`(`hash`) VALUES (:a) where id = :b";
        $hash = User::hash();
        $params = array(
            ':a'=>$hash,
            ':b'=>$id
        );

        $data = new DataAccess();
        $results = $data->Fetch($sql, $params);
    }
}