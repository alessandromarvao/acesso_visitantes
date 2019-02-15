<?php

use Controller\Classes\UsuariosController;
use Controller\Classes\SessionController;

include_once "../../bootstrap.php";


if(isset($_POST['user']) && isset($_POST['pwd']))
{
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    if(UsuariosController::check($user, $pwd)){
        //Armazena os dados do usuário na variável
        $usuário = UsuariosController::read($user);
        //Inicia Sessão
        SessionController::init();    
        //Adiciona na variável o privilégio do usuário
        $privilegio = $usuário['privilegio'];
        //Armazena na sessão os dados de acesso do usuário
        SessionController::setUser($user, $privilegio, $usuário['p_nome']);
        //Redireciona à página de acesso do usuário
        header(UsuariosController::checkPrivilegios($privilegio));
    } else {
        echo "Usuário ou senha incorretos";
    }
} else {
    // header('Location: ../../index.php');
}