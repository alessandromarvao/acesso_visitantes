<?php
include_once "../../bootstrap.php";

use Model\Vouchers;

$file = fopen($_FILES['voucher']['tmp_name'], 'r');
while (($line = fgetcsv($file)) !== FALSE) {
  //$line is an array of the csv elements
  foreach($line as $row){
    Vouchers::create($row);
  }
}

fclose($file);

header('Location: /acesso_visitantes/views/admin/list_voucher.php');
