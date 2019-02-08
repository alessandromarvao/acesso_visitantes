<?php

use Controller\Classes\UsuariosController;
use Controller\Classes\SessionController;

include_once "../../bootstrap.php";

if(isset($_POST['user']) && isset($_POST['pwd']))
{
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    if(UsuariosController::check($user, $pwd)){
        //Adiciona na variável o privilégio do usuário
        $privilegio = UsuariosController::read($user)['privilegio'];
        //Armazena na sessão os dados de acesso do usuário
        SessionController::setUser($user, $privilegio);
        //Redireciona à página de acesso do usuário
        header(UsuariosController::checkPrivilegios($privilegio));
    } else {
        echo "erro";
    }
} else {
    // header('Location: ../../index.php');
}