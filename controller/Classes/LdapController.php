<?php

namespace Controller\Classes;

include_once '../../env.php';

class LDAPController
{
    private $conn;
    private $ldapBind;

    function __construct(){
        $this->conn = \ldap_connect(LDAP_SERVER, LDAP_PORT) or die ("Sem conexão com o servidor de domínio");
    }

    /**
     * Confere a credencial do usuário no servidor de domínio.
     * 
     * @param $usr Credencial do usuário
     * @param $pwd Senha do usuário
     * @return TRUE se confirmar credencial e FALSE se não.
     */
    public function checkAccess($usr, $pwd){
	$ldaprdn  = $usr . "@". LDAP_DOMAIN;     // ldap rdn or dn
        $ldappass = $pwd;  // associated password

        // connect to ldap server
        if ($this->conn) {
            // binding to ldap server
            $this->ldapBind = @ldap_bind($this->conn, $ldaprdn, $ldappass);

            // verify binding
            if ($this->ldapBind) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

	/*
        * if(@ldap_bind($this->conn, $usr."@".LDAP_DOMAIN, $pwd)) {
        *     return TRUE;
        * } else {
        *     echo "Erro no login";
        *     return FALSE;
        * }
	*/
    }

    function __destroy(){
        return @ldap_close($this->conn);
    }
}
