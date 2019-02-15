<?php
include_once "../../bootstrap.php";

use Controller\Classes\LogsController;


$data = [];

$data = LogsController::read();

$response = ['data' => $data];

echo json_encode($response);