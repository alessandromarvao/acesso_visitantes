<?php

namespace Controller;

Use Model\Usuarios;
Use Model\LDAP_Conn;

class UsuariosController
{
    public static function check($matricula)
    {
        $usuarios = new Usuarios();
        $ldap_conn = new LDAP_Conn();

        if($usuarios->check($matricula) && $ldap_conn->checkAccess($matricula, $senha))
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function create($matricula, $privilegio)
    {        
        $usuarios = new Usuarios();

        return $usuarios->create($matricula, $privilegio);
    }
}