<?php

namespace Controller\Classes;

Use Model\Usuarios;
Use Controller\Classes\LDAPController;

class UsuariosController
{
    public static function check($user, $senha)
    {
        $usuarios = new Usuarios();
        $ldap_conn = new LDAPController();
        
        if($usuarios->check($user) && $ldap_conn->checkAccess($user, $senha))
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function create($user, $access)
    {        
        $usuarios = new Usuarios();

        if($usuarios->create($user, $access)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function read($user = null)
    {
        $usuarios = new Usuarios();
        return $usuarios->read($user);
    }

    public static function checkPrivilegios($privilegio)
    {
        if($privilegio==1){
            return "Location: /views/admin/index.php";
        } else {
            return "Location: /views/user/index.php";
        }
    }
}