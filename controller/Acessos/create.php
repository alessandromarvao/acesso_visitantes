<?php
include_once "../../bootstrap.php";

date_default_timezone_set('America/Recife');

use Model\Acessos;
use Model\Conexao;
use Model\Logs;
use Controller\Classes\SessionController;
use Model\Vouchers;

$user = "";
$voucher = Vouchers::getFirst();

if(isset($_POST['user'])) {
    $user = $_POST['user'];
}

// if(Acessos::create($user, $voucher['id'], $_POST['input_nome'])){
//     Vouchers::utilizado($voucher['id']);

//     $date = date('Y-m-d H:i:s');

//     $msg = "Validou o acesso à rede wi-fi para <b>" . $_POST['input_nome'] . "</b> através do voucher <b>" . $voucher['voucher'] . "</b>";

//     Logs::create($user, $date, $msg);
//     $array = [
//         'voucher' => $voucher['voucher']
//     ];

//     echo json_encode($array);
// }

try {
    $conexao = new Conexao();

    $conexao->beginTransaction();

    Acessos::create($user, $voucher['id'], $_POST['input_nome']);
    Vouchers::utilizado($voucher['id']);

    $msg = "Validou o acesso à rede wi-fi para <b>" . $_POST['input_nome'] . "</b> através do voucher <b>" . $voucher['voucher'] . "</b>";

    Logs::create($user, date('Y-m-d H:i:s'), $msg);
    $array = [
        'voucher' => $voucher['voucher']
    ];

    $conexao->commit();

    echo json_encode($array);
} catch(Exception $e){
    $conexao->rollback();

    $array = [
        'voucher' => 'Falha na autenticação. Por favor, tente novamente. <br>' . $e->getMessage()
    ];

    echo json_encode($array);
}
