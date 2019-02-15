<?php
namespace Model;

use Model\Conexao;

class Logs extends Conexao
{
    public function create($usuario, $data, $mensagem)
    {
        $stmt = $this->conn->prepare('INSERT INTO logs (id_usuarios, data, msg) VALUES (?,?,?)');
        $stmt->bindParam(1, $usuario);
        $stmt->bindParam(2, $data);
        $stmt->bindParam(3, $mensagem);

        return $stmt->execute();
    }

    public function read($id=NULL)
    {
        $query = 'SELECT id, id_usuarios, data, log FROM logs';

        if(!empty($id)){
            $query .= " WHERE id=?";
        }
        
        $query .= " ORDER BY data DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        if(!empty($id))
        {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}
