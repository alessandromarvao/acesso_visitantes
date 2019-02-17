<?php
include_once "../../bootstrap.php";

use Controller\Classes\LogsController;
use Controller\Classes\SessionController;
use Controller\Classes\UsuariosController;

if($_POST['user'] && $_POST['access']){
    $acesso = "";
    switch($_POST['access']) {
        case 1:
            $acesso = 'Administrador';
            break;
        case 2:
            $acesso = "Recepcionista";
            break;
    }

    if(UsuariosController::create($_POST['user'], $_POST['access'], $_POST['p_nome'], $_POST['u_nome'])){ 
        LogsController::create(SessionController::get('user'), date('Y-m-d H:i:s'), 'Cadastrou o usuário: <b>' . $_POST['p_nome'] . " (Matrícula/CPF: " . $_POST['user'] . ")</b> como $acesso"); 
        header('Location: /views/admin/index.php');
    } else {
        header('Location: /views/admin/show.php');
    }
}