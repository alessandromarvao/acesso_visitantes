<?php
namespace Model;

use Model\Conexao;

class Logs extends Conexao
{
    public function create($usuario, $data, $mensagem)
    {
        $stmt = $this->conn->prepare('INSERT INTO logs (matricula_usuarios, data, msg) VALUES (?,?,?)');
        $stmt->bindParam(1, $usuario);
        $stmt->bindParam(2, $data);
        $stmt->bindParam(3, $mensagem);

        return $stmt->execute();
    }

    public function read($id=NULL)
    {
        $query = 'SELECT a.id, a.matricula_usuarios, DATE_FORMAT(a.data, '. "'%d/%m/%Y %H:%i:%s'" . ') as data, a.msg, b.p_nome FROM logs a LEFT JOIN usuarios b ON a.matricula_usuarios=b.matricula ORDER BY data DESC';        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
