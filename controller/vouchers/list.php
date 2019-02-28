<?php
include_once "../../bootstrap.php";

use Model\Vouchers;

$data = [];

$data = Vouchers::read();

$response = ['data' => $data];

echo json_encode($response);