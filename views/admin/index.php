<?php
include_once "header.php";
include_once "../../bootstrap.php";


use Controller\Classes\SessionController;
use Controller\Classes\AcessosController;



?>

<div class="container-fluid page">
<div class="col-md-3">
    <div class="jumbotron">
        <div class="container">
            <h1><?php print_r(AcessosController::getAcessosByTime()); ?></h1>
            <h3>Usuários conectados esta noite</h3>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="jumbotron">
        <div class="container">
            <h1><?php print_r(AcessosController::getAcessosByDate()); ?></h1>
            <h3>Usuários conectados hoje</h3>
        </div>
    </div>
</div>
<!-- INSIRA O CONTEÚDO AQUI -->
</div>

<?php
include_once "../default/footer.php";
?>