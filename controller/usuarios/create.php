<?php
include_once "../../bootstrap.php";

use Controller\Classes\UsuariosController;

if($_POST['user'] && $_POST['access']){
    if(UsuariosController::create($_POST['user'], $_POST['access'], $_POST['p_nome'], $_POST['u_nome'])){  
        header('Location: /views/admin/index.php');
    } else {
        header('Location: /views/admin/show.php');
    }
}