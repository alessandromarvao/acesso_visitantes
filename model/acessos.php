<?php

namespace Model;

use Model\Conexao;

class Acessos extends Conexao
{
    /**
     * Adiciona um novo acesso ao Banco de Dados
     * 
     * @param $matricula Matrícula ou CPF do usuário
     * @param $voucher ID do voucher selecionado
     * @param $nome Nome do usuário que deseja acessar o sistema
     * @param $contato Telefone de contato do usuário
     * 
     * @return bool TRUE caso o cadastro ocorra com sucesso ou FALSE se ocorrer algum erro.
     */
    public function create($matricula, $voucher, $nome){
        date_default_timezone_set('America/Recife');
        
        $date = date("Y-m-d H:i:s");

        $stmt = $this->conn->prepare('INSERT INTO acessos (matricula_usuarios, id_vouchers, nome, acessado_em) VALUES (?,?,?,?)');
        $stmt->bindParam(1, $matricula);
        $stmt->bindParam(2, $voucher);
        $stmt->bindParam(3, $nome);
        $stmt->bindParam(4, $date);

        return $stmt->execute();
    }

    /**
     * Pesquisa o(s) acesso(s) cadastrado(s) no Banco de Dados
     * 
     * @param $id ID do acesso
     * @return array 
     */
    public function read($id=NULL)
    {
        $query = "SELECT id, matricula_usuarios, id_vouchers, nome, contato, acessado_em FROM acessos";

        if(!empty($id)){
            $query .= " WHERE id= ?";
        }

        $query .= "ORDER BY id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam($id);
        $stmt->execute();

        if(!empty($id)){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            return $stmt->fechtAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getAcessosByTime($time1, $time2)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(id) FROM acessos WHERE acessado_em BETWEEN ? AND ?");
        $stmt->bindParam(1, $time1);
        $stmt->bindParam(2, $time2);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC)['COUNT(id)'];
    }
    
    public function getAcessosByDate($date)
    {
        $date = $date."%";
        $stmt = $this->conn->prepare('SELECT COUNT(id) FROM acessos WHERE acessado_em LIKE ?');
        $stmt->bindParam(1, $date);
        $stmt->execute();
        
        return $stmt->fetch(\PDO::FETCH_ASSOC)['COUNT(id)'];
    }
}