<?php
namespace Model;

use Model\Conexao;

// class Usuarios extends Conexao
class Usuarios
{
    /**
     * Armazena um novo usuário no sistema
     * 
     * @param $user Matrícula do usuário
     * @param $access Nível de acesso do usuário (1 - adm; 2 - padrão)
     * @return BOOLEAN TRUE se o cadastro ocorrer com sucesso ou FALSE se houver falha
     */
    public static function create($user, $access, $first_name, $last_name)
    {
        $query = 'INSERT INTO usuarios (matricula,  privilegio, p_nome, u_nome) VALUES (?,?,?,?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $user
            ],
            1 => [
                '#' => 2,
                'value' => $access
            ],
            2 => [
                '#' => 3,
                'value' => $first_name
            ],
            3 => [
                '#' => 4,
                'value' => $last_name
            ],
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Retorna o(s) usuário(s) cadastrado(s). Se houver parâmetro, retorna os dados do usuário em questão
     * 
     * @param $user Matrícula do usuário
     * @return array Dados do(s) usuário(s)
     */
    public static function read($user = null)
    {
        $query = 'SELECT matricula, privilegio, p_nome, u_nome FROM usuarios';
        
        if(!empty($user))
        {
            $query .= " WHERE matricula=?";
        }

        $query .= " ORDER BY privilegio ASC, p_nome ASC";

        $conexao = new Conexao();

        return $conexao->select($query, $user);
    }
    
    public function update()
    {
        //
    }
    
    public static function check($user)
    {
        $query = 'SELECT COUNT(matricula) FROM usuarios WHERE matricula=?';
        
        $conexao = new Conexao();

        return $conexao->select($query, $user);
    }
}