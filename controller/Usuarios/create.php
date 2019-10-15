<?php
include_once "../../bootstrap.php";

use Controller\Classes\SessionController;
use Model\Conexao;
use Model\Logs;
use Model\Usuarios;

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

    // if(UsuariosController::create($_POST['user'], $_POST['access'], $_POST['p_nome'], $_POST['u_nome'])){ 
    //     LogsController::create(SessionController::get('user'), date('Y-m-d H:i:s'), 'Cadastrou o usuário: <b>' . $_POST['p_nome'] . " (Matrícula/CPF: " . $_POST['user'] . ")</b> como $acesso"); 
    //     header('Location: /views/admin/index.php');
    // } else {
    //     header('Location: /views/admin/show.php');
    // }

    try{
        $conexao = new Conexao();

        $conexao->beginTransaction();
        
        Usuarios::create($_POST['user'], $_POST['access'], $_POST['p_nome'], $_POST['u_nome']);
        Logs::create(SessionController::get('user'), date('Y-m-d H:i:s'), 'Cadastrou o usuário: <b>' . $_POST['p_nome'] . " (Matrícula/CPF: " . $_POST['user'] . ")</b> como $acesso"); 
        
        $conexao->commit();
    } catch(Exception $e){
        $conexao->rollback();
    }
    
    header('Location: /acesso_visitantes/views/admin/show.php');
}
