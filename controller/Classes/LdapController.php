<?php

namespace Controller\Classes;

include_once '../../env.php';

class LDAPController
{
    private $conn;
    private $ldapBind;

    function __construct(){
        $this->conn = ldap_connect(LDAP_SERVER, LDAP_PORT) or die ("Sem conexão com o servidor de domínio");
    }

    /**
     * Confere a credencial do usuário no servidor de domínio.
     * 
     * @param $usr Credencial do usuário
     * @param $pwd Senha do usuário
     * @return TRUE se confirmar credencial e FALSE se não.
     */
    public function checkAccess($usr, $pwd){
        if(@ldap_bind($this->conn, $usr."@".LDAP_DOMAIN, $pwd)) {
            return TRUE;
        } else {
            echo "Erro no login";
            return FALSE;
        }
    }

    function __destroy(){
        return @ldap_close($this->conn);
    }
}