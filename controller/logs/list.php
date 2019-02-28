<?php
include_once "../../bootstrap.php";

use Model\Logs;


$data = [];

$data = Logs::read();

$response = ['data' => $data];

echo json_encode($response);