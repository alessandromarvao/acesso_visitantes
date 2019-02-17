<?php
include_once "header.php";
include_once "../../bootstrap.php";


use Controller\Classes\SessionController;
use Controller\Classes\AcessosController;

$turno;

switch(true){
    case date('H:i:s') <= '12:00:00':
        $turno = "manhã";
        break;
    case date('H:i:s') <= '18:00:00':
        $turno = "tarde";
        break;
    case date('H:i:s') <= '23:59:59':
        $turno = "noite";
        break;
}


?>

<div class="container-fluid page">
<div class="col-md-3">
    <div class="jumbotron">
        <div class="container">
            <h1><?php print_r(AcessosController::getAcessosByTime()); ?></h1>
            <h3>Usuário(s) conectado(s) à rede Wi-Fi esta <?php echo $turno; ?></h3>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="jumbotron">
        <div class="container">
            <h1><?php print_r(AcessosController::getAcessosByDate()); ?></h1>
            <h3>Usuário(s) conectado(s) à rede Wi-Fi hoje</h3>
        </div>
    </div>
</div>
<!-- INSIRA O CONTEÚDO AQUI -->
</div>

<?php
include_once "../default/footer.php";
?>