<?php

namespace Controller\Classes;

class SessionController
{
    public static function init(){        
        if(session_id() == '') {
            session_start();
        }
        
        return TRUE;
    }

    public static function setUser($user, $access, $nome){
        self::init();

        $_SESSION['user'] = $user;
        $_SESSION['access'] = $access;
        $_SESSION['nome'] = $nome;

        return TRUE;
    }

    public static function set($param, $value){
        self::init();
        
        $_SESSION[$param] = $value;
    }

    public static function get($param){
        self::init();
        
        return $_SESSION[$param];
    }

    public static function checkLogin(){
        self::init();
        
        // $_SESSION['error'] = 'true';
    }

    public static function getAccess(){
        self::init();
        
        return $_SESSION['access'];
    }

    public static function getUser(){
        self::init();
        
        return $_SESSION['user'];
    }

    public static function checkAccess($permission){
        self::init();
        
        if(isset($_SESSION['user'])) {
            if($_SESSION['access']==$permission){
                return TRUE;
            } else {
                return FALSE; 
            }
        } else {
            return FALSE;
        }
    }

    public static function close(){
        self::init();
        
        session_destroy();

        return TRUE;
    }
}