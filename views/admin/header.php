<?php
include_once "../../bootstrap.php";

use Controller\Classes\SessionController;

if(!SessionController::checkAccess(1)){
    header('location: /acesso_visitantes/');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acesso à Rede Visitante</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/acesso_visitantes/css/style.css">
</head>
<body>
<!-- Sistema desenvolvido por Alessandro Marvão (SIAPE: 2244339) -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Início</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuários<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="create.php ">Cadastrar Usuários</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="show.php">Listar Usuários</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vouchers<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="list_voucher.php">Listar Vouchers</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="new_voucher.php">Adicionar Vouchers</a></li>
                    </ul>
                </li>
                <li><a href="logs.php">Logs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Olá, <?php echo SessionController::get('nome'); ?>!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="text-right"><a href="/acesso_visitantes/controller/logout.php">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
