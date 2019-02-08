<?php

namespace Controller\Classes;

class SessionController
{
    function __construct(){
        session_start();
    }

    public static function setUser($user, $access){
        $_SESSION['user'] = $user;
        $_SESSION['access'] = $access;

        return TRUE;
    }

    public static function close(){
        session_destroy();
    }

    public static function checkAccess(){
        return $_SESSION['access'];
    }
}