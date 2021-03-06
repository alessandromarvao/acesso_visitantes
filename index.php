<?php
include_once "bootstrap.php";

use Controller\Classes\SessionController;

SessionController::init();


switch(SessionController::get('access')){
    case 1:
        header("Location:views/admin/index.php");
        break;
    case 2:
        header("Location:views/user/index.php");
        break;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acesso à Rede Visitante</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/signin.css">
</head>
<body>
<!-- Sistema desenvolvido por Alessandro Marvão (SIAPE: 2244339) -->
<?php
// if(SessionController::){
?>
<?php

?>
<div class="container-fluid">
    <form action="controller/Usuarios/login.php" method="post" class="form-signin">
    <h2 class="form-signin-heading">Acesso ao Sistema</h2>
    <hr>
    <label for="inputuser" class="sr-only">Usuário</label>
    <input type="text" name="user" id="inputuser" class="form-control" placeholder="Matrícula ou CPF" required autofocus autocomplete="off">
    <label for="inputPwd" class="sr-only">Senha</label>
    <input type="password" id="inputPwd" name="pwd" class="form-control" placeholder="Senha" required>
    <br/>
    <?php
    if($_REQUEST['msg']) {
	echo "<div class='alert alert-danger' role='alert'>Usuário ou senha incorreto</div>";
    }
    ?>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
