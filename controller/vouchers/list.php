<?php
include_once "../../bootstrap.php";

use Controller\Classes\VouchersController;

$data = [];

// foreach(VouchersController::read() as $row){
//     $data[] = $row;
// }

$data = VouchersController::read();

$response = ['data' => $data];

echo json_encode($response);