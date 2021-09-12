<?php

class user
{
    public $id;
    public $username;
    public $email;
    public $permissions;
    public $approved;
    public $safe;
    public $dateJoined;
    public $activeEvents;
    public $totalEvents;

    public function __construct($id)
    {
        $sql = "SELECT * from `users` WHERE `id`=:a";
        $sql2 = "SELECT count(e1.id) as total, (select count(*) as active from events where time > '".Date('Y-m-d')."' and author = :a) as active from events as e1 WHERE e1.author= :a";
        $params = array(
            ':a'=>$id
        );
        $data = new DataAccess();
        $results = $data->Fetch($sql, $params);
        $results2 = $data->Fetch($sql2, $params);

        $this->id = $results[0]->id;
        $this->username = $results[0]->username;
        $this->email = $results[0]->email;
        $this->permissions = $results[0]->permissions;
        $this->approved = $results[0]->approved;
        $this->safe = $results[0]->safe;
        $this->dateJoined = $results[0]->date_joined;
        $this->activeEvents = $results2[0]->active;
        $this->totalEvents = $results2[0]->total;
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
            //$_COOKIE['user_id'] = $results->id;
            $hash = User::hash();
            setcookie( 'user_id', $results[0]->id, time() + 3600, "/", "event.liamanderson.co.uk", true, true );
            setcookie( 'hash', $hash, time() + 3600, "/", "event.liamanderson.co.uk", true, true );
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

        if($results[0]){
            return json_encode(array('auth'=>'success'));
        } else{
            return json_encode(array('auth'=>'fail'));
        }

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

    public static function permissions(){
        $sql = "SELECT permissions from `users` WHERE `id`=:a";
        $params = array(
            ':a'=>$_COOKIE['user_id']
        );
        $data = new DataAccess();
        $results = $data->Fetch($sql, $params)[0];

        return $results;
    }

    public static function newUsers(){
        $sql = "SELECT * from `users` where date_joined > '".Date('Y-m-d', strtotime('last week')). " 00:00:00'";
        $data = new DataAccess();
        $results = $data->Fetch($sql, null);

        return $results;
    }
}