<?php
namespace Model;

use Model\Conexao;

class Usuarios extends Conexao
{
    /**
     * Armazena um novo usuário no sistema
     * 
     * @param $user Matrícula do usuário
     * @param $access Nível de acesso do usuário (1 - adm; 2 - padrão)
     * @return BOOLEAN TRUE se o cadastro ocorrer com sucesso ou FALSE se houver falha
     */
    public function create($user, $access, $first_name, $last_name)
    {
        $stmt = $this->conn->prepare('INSERT INTO usuarios (matricula,  privilegio, p_nome, u_nome) VALUES (?,?,?,?)');
        $stmt->bindParam(1, $user);
        $stmt->bindParam(2, $access);
        $stmt->bindParam(3, $first_name);
        $stmt->bindParam(4, $last_name);

        return $stmt->execute();
    }

    /**
     * Retorna o(s) usuário(s) cadastrado(s). Se houver parâmetro, retorna os dados do usuário em questão
     * 
     * @param $user Matrícula do usuário
     * @return array Dados do(s) usuário(s)
     */
    public function read($user = null)
    {
        $query = 'SELECT matricula, privilegio, p_nome, u_nome FROM usuarios';
        
        if(!empty($user))
        {
            $query .= " WHERE matricula=?";
        }

        $query .= " ORDER BY privilegio";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $user);
        $stmt->execute();
        
        if(!empty($user))
        {            
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
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
        
        return $stmt->fetch(\PDO::FETCH_ASSOC)['COUNT(matricula)'];
    }
}