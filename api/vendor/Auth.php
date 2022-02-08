<?php

include_once ROOT_DIR . '/models/Users.php';

class Auth {

    private static $instance = null;

    public static function get()
    {
        if(!static::$instance){
            static::$instance = new Auth();
        }

        return static::$instance;
    }

    public static function setUser (Users $user)
    {
        $_SESSION['user'] = $user;
    }

    public static function User ()
    {
        return $_SESSION['user'];
    }

    public static function check ()
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : false;
    }

    public static function logout ()
    {
        unset($_SESSION['user']);
    }
}