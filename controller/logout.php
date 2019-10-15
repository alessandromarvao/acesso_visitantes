<?php

include_once "../bootstrap.php";

use Controller\Classes\SessionController;

if(SessionController::close()){
    header('location: /acesso_visitantes/index.php');
}
