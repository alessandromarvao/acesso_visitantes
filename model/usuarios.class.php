<?php
include_once 'conexao.class.php';

class Usuarios extends Conexao
{
    private $conexao;

    /**
     * Armazena um novo usuário no sistema
     */
    public function create($matricula, $privilegio)
    {
        $stmt = $this->conn->prepare('INSERT INTO usuarios (matricula,  privilegio) VALUES (?,?)');
        $stmt->bindParam(1, $matricula);
        $stmt->bindParam(2, $privilegio);

        return $stmt->execute();
    }

    public function read($matricula)
    {
        $query = 'SELECT matricula, privilegio FROM usuarios';
        
        if(!empty($matricula))
        {
            $query .= " WHERE matricula=?";
        }
        
        $stmt = $this->conn->prepare();
        $stmt->bindParam(1, $usr);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update()
    {
        //
    }
    
    public function check($usr)
    {
        $stmt = $this->conn->prepare('SELECT COUNT(matricula) FROM usuarios WHERE matricula=?');
        $stmt->bindParam(1, $usr);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['COUNT(matricula)'];
    }
}