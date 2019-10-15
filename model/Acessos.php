<?php

namespace Model;

use Model\Conexao;

class Acessos
{
    /**
     * Adiciona um novo acesso ao Banco de Dados
     * 
     * @param $matricula Matrícula ou CPF do usuário
     * @param $voucher ID do voucher selecionado
     * @param $nome Nome do usuário que deseja acessar o sistema
     * 
     * @return bool TRUE caso o cadastro ocorra com sucesso ou FALSE se ocorrer algum erro.
     */
    public static function create($matricula, $voucher, $nome){
        date_default_timezone_set('America/Recife');

        $query = 'INSERT INTO acessos (matricula_usuarios, id_vouchers, nome, acessado_em) VALUES (?,?,?,?)';
        $data = [
            0 => [
                '#' => '1',
                'value' => $matricula
            ],
            1 => [
                '#' => '2',
                'value' => $voucher
            ],
            2 => [
                '#' => '3',
                'value' => $nome
            ],
            3 => [
                '#' => '4',
                'value' => date("Y-m-d H:i:s")
            ]
        ];
        
        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Pesquisa o(s) acesso(s) cadastrado(s) no Banco de Dados
     * 
     * @param $id ID do acesso
     * @return array 
     */
    public static function read($id=NULL)
    {
        $query = "SELECT id, matricula_usuarios, id_vouchers, nome, acessado_em FROM acessos";

        if(!empty($id)){
            $query .= " WHERE id= ?";
        }

        $query .= " ORDER BY id ASC";

        $conexao = new Conexao();

        return $conexao->select($query, $id);
    }

    public static function getAcessosByTime()
    {
        date_default_timezone_set('America/Recife');

        $time1 = '';
        $time2 = '';

        switch(true){
            case date('H:i:s') <= '12:00:00':
                $time1 = date('Y-m-d') . ' 00:00:00';
                $time2 = date('Y-m-d') . ' 12:00:00';
                break;
            case date('H:i:s') <= '18:00:00':
                $time1 = date('Y-m-d') . ' 12:00:00';
                $time2 = date('Y-m-d') . ' 18:00:00';
                break;
            case date('H:i:s') <= '23:59:59':
                $time1 = date('Y-m-d') . ' 18:00:00';
                $time2 = date('Y-m-d') . ' 23:59:59';
                break;
        }

        $query = "SELECT COUNT(id) FROM acessos WHERE acessado_em BETWEEN ? AND ?";
        $data = [
            0 => [
                '#' => 1,
                'value' => $time1 . "%"
            ],
            1 => [
                '#' => 2,
                'value' => $time2 . "%"
            ],
        ];

        $conexao = new Conexao();

        return $conexao->selectByParams($query, $data)[0]['COUNT(id)'];
    }
    
    public static function getAcessosByDate()
    {
        date_default_timezone_set('America/Recife');

        $query = 'SELECT COUNT(id) FROM acessos WHERE acessado_em LIKE ?';
        $data = [
            0 => [
                '#' => 1,
                'value' => date('Y-m-d') . "%"
                ]
            ];
            
            $conexao = new Conexao();
            
        return $conexao->selectByParams($query, $data)[0]['COUNT(id)'];
    }
}