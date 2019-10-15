<?php
namespace Model;

use Model\Conexao;

class Logs
{
    public static function create($usuario, $date, $mensagem)
    {
        $query = 'INSERT INTO logs (matricula_usuarios, data, msg) VALUES (?,?,?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $usuario
            ],
            1 => [
                '#' => 2,
                'value' => $date
            ],
            2 => [
                '#' => 3,
                'value' => $mensagem
            ]
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    public static function read($id=NULL)
    {
        $query = 'SELECT a.id, a.matricula_usuarios, DATE_FORMAT(a.data, '. "'%d/%m/%Y %H:%i:%s'" . ') as data, a.msg, b.p_nome FROM logs a LEFT JOIN usuarios b ON a.matricula_usuarios=b.matricula ORDER BY data DESC';        
        
        $conexao = new Conexao();

        return $conexao->select($query);
    }
}
