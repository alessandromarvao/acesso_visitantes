<?php

use Model\Usuarios;
use Controller\Classes\SessionController;

include_once "../../bootstrap.php";


if(isset($_POST['user']) && isset($_POST['pwd']))
{
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    
    if(Usuarios::check($user, $pwd)){
        //Armazena os dados do usuário na variável
        $usuário = Usuarios::read($user);
        //Inicia Sessão
        SessionController::init();    
        //Adiciona na variável o privilégio do usuário
        $privilegio = $usuário['privilegio'];
        //Armazena na sessão os dados de acesso do usuário
        SessionController::setUser($user, $privilegio, $usuário['p_nome']);
        
        //Armazena na variável o caminho da página de acesso do usuário
        $page = "";
        if($privilegio==1){
            $page = "Location: /acesso_visitantes/views/admin/index.php";
        } else {
            $page = "Location: /acesso_visitantes/views/user/index.php";
        }
        
        //Redireciona à página de acesso do usuário        
        header($page);
    } else {
        echo "Usuário ou senha incorretos";
    }
} else {
    // header('Location: ../../index.php');
}
