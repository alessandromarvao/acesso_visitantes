<?php
include_once "../../bootstrap.php";

use Controller\Classes\VouchersController;
header('Content-Type: application/json');

$array = json_encode([
    'data' => VouchersController::read() 
]);
    
print_r($array);