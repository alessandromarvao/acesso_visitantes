<?php

include_once "../bootstrap.php";

use Controller\Classes\SessionController;

if(SessionController::close()){
    header('location: /index.php');
}
