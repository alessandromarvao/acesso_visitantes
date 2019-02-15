<?php
include_once "../../bootstrap.php";

use Controller\Classes\VouchersController;

$file = fopen($_FILES['voucher']['tmp_name'], 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
  foreach($line as $row){
    VouchersController::create($row);
  }
}

fclose($file);

header('Location: /views/admin/list_voucher.php');