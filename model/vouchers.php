<?php
namespace Model;

// include_once 'conexao.class.php';
use Model\Conexao;

class Vouchers extends Conexao
{
    // private $conexao;

    /**
     * Armazena um novo voucher no sistema
     * 
     * @param $voucher Voucher de acesso à rede Wi-Fi visitantes
     * @param $bool Confere se o voucher foi utilizado ou não
     * @return BOOLEAN TRUE se o cadastro ocorrer com sucesso ou FALSE se houver falha
     */
    public static function create($voucher, $bool)
    {
        $query = 'INSERT INTO vouchers (voucher, utilizado) VALUE (?, ?)';
        $data = [
            0 => [
                '#' => 1,
                'value' => $voucher
            ],
            1 => [
                '#' => 2,
                'value' => $bool
            ]
        ];

        $conexao = new Conexao();

        return $conexao->execute($query, $data);
    }

    /**
     * Retorna os vouchers cadastrados. Se houver parâmetro, retorna os dados do usuário em questão
     * 
     * @return array Dados do(s) usuário(s)
     */
    public static function read()
    {
        $query = 'SELECT id, voucher FROM vouchers WHERE utilizado=0';
        
        $conexao = new Conexao();

        return $conexao->select($query);
    }
    
    public static function getFirst()
    {
        $query = 'SELECT id, voucher FROM vouchers WHERE utilizado=0 LIMIT 1';
        
        $conexao = new Conexao();
    
        return $conexao->select($query)[0];
    }

    public static function utilizado($id)
    {
        $query = 'UPDATE vouchers SET utilizado=1 WHERE id=?';
        $data = [
            0 => [
                '#' => 1,
                'value' => $id
            ]
        ];

        $conexao = new Conexao();

        return $conexao->select($query, $id);
    }

    // public function list_old()
    // {
    //     $stmt = $this->conn->prepare('SELECT id, voucher FROM vouchers WHERE utilizado=1');
    //     $stmt-> execute();

    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }
}