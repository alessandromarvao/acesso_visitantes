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
    public function create($voucher, $bool)
    {
        $stmt = $this->conn->prepare('INSERT INTO vouchers (voucher, utilizado) VALUE (?, ?)');
        $stmt->bindParam(1, $voucher);
        $stmt->bindParam(2, $bool);

        return $stmt->execute();
    }

    /**
     * Retorna os vouchers cadastrados. Se houver parâmetro, retorna os dados do usuário em questão
     * 
     * @return array Dados do(s) usuário(s)
     */
    public function read()
    {
        $stmt = $this->conn->prepare('SELECT id, voucher FROM vouchers WHERE utilizado=0');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // public function list_old()
    // {
    //     $stmt = $this->conn->prepare('SELECT id, voucher FROM vouchers WHERE utilizado=1');
    //     $stmt-> execute();

    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }
}