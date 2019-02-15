<?php
include_once "../../bootstrap.php";

use Controller\Classes\AcessosController;
use Controller\Classes\LogsController;
use Controller\Classes\SessionController;
use Controller\Classes\VouchersController;

$user = "";
$voucher = VouchersController::getFirst();

if(isset($_POST['user'])) {
    $user = $_POST['user'];
}

if(AcessosController::create($user, $voucher['id'], $_POST['input_nome'])){
    VouchersController::utilizado($voucher['id']);

    $date = date('Y-m-d H:i:s');

    $msg = "Validou o acesso à rede wi-fi para " . $_POST['input_nome'] . " através do voucher " . $voucher['voucher'];

    LogsController::create($user, $date, $msg);
    $array = [
        'voucher' => $voucher['voucher']
    ];

    echo json_encode($array);
}