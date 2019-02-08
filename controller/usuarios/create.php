<?php
include_once "../../bootstrap.php";

use Controller\Classes\UsuariosController;

if($_POST['user'] && $_POST['access']){
    if(UsuariosController::create($_POST['user'], $_POST['access'])){    
        header('Location: /views/admin/index.php');
    }
}