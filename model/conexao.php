<?php

namespace Model;

include_once '../../env.php';

/**
 * Esta classe cria a conexão com o Banco de Dados usando o PDO, 
 * que fornece seguranãa e também cria pools de conexão para administrar
 * o tráfego de informações no Banco de Dados
 *
 * @author Alessandro Marvão <alessandromarvao@gmail.com>
 * @version 1.0
 * @copyright (c) 2015, Alessandro Marvão
 * @access public
 */
class Conexao {
    
    protected $conn;
    
    /**
     * Retorna um objeto da classe PDO já com as informações
     * necessárias à ligação com o Banco de Dados
     * 
     * @access public
     * @return PDO retorna um objeto PDO
     */
    function __construct(){
        try {
            $this->conn = new \PDO('mysql:host=' . HST . ';dbname=' . BD, USR, PWD);
        } catch (Exception $ex) {
            print_r("Erro ao conectar com o Banco de Dados. " . $ex->getMessage());
        }
        return $this->conn;
    }

    function __destroy(){
        $this->conn = null;
    }
}
