<?php
include_once "../../bootstrap.php";

use Controller\Classes\VouchersController;

$data = [];

$data = VouchersController::read();

$response = ['data' => $data];

echo json_encode($response);