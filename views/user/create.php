<?php
include_once "header.php";

use Controller\Classes\SessionController;

?>

<div class="container-fluid">
    <h3>Validar Acesso</h3>
    <hr>
    <form>
        <div class="form-group">
            <div class="col-md-4">
                <input type="text" name="user" id="" value="<?php echo SessionController::get('user'); ?>" class="hidden">
                <label for="input_nome">Nome:</label>
                <input type="text" name="input_nome" id="input_nome" class="form-control" placeholder="Digite o nome da pessoa que deseja acessar a rede visitantes" autocomplete="off" autofocus required >
                <hr>
                <input type="submit" value="Enviar" class="btn btn-lg btn-default">
                <a href="index.php" class="btn btn-lg btn-warning col-md-offset-7">Voltar</a>
            </div>
            <div class="col-md-6" id="voucher">
            </div>
        </div>
    </form>
</div>


<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script>
    $("form").on("submit", function(event){
        event.preventDefault();
        $.ajax(
            {
                method: "POST",
                async: 'false',
                url: "../../controller/acessos/create.php",
                data: "user=" + $( "input[name='user']" ).val() + "&input_nome=" + $( "input[name='input_nome']" ).val(), 
                dataType: "json",
                success: function(result){
                    var txt = "<h2>O seu voucher de acesso é:<br/>\n<u>" + "<div class='upper'>" + result['voucher'] + "</div></u></h1>";
                    $("#voucher").html(txt);
                }
            }
        );
    });
</script>
    
</body>
</html>