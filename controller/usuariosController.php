<?php
include_once '../model/usuarios.class.php';
include_once '../model/ldap_conn.class.php';

class UsuariosController
{
    private $usuarios;
    private $ldap_conn;

    function __contruct()
    {
        $this->usuarios = new Usuarios();
        $this->ldap_conn = new LDAP_Conn();
    }

    public function check($matricula)
    {
        if($this->usuarios->check($matricula) && $this->ldap_conn->checkAccess($matricula, $senha))
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function create()
    {
        return $this->usuarios->create($matricula, $privilegio);
    }

    function __destroy()
    {
        $this->usuarios = null;
        $this->ldap_conn = null;
    }
}