<?php

include_once "header.php";
?>

<h3>Adicionar Vouchers</h3>
<hr>

<form enctype="multipart/form-data" action="../../controller/vouchers/create.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <div class="col-md-4">
        <div class="form-group">
            <label for="voucher">Upload de arquivo:</label>
            <input type="file" name="voucher" id="voucher" class="form-control" required><br>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-lg btn-success" >Enviar</button>
        </div>
        <div class="col-md-2 col-md-offset-8">
            <a href="/acesso_visitantes/views/admin/index.php" class="btn btn-lg btn-warning">Voltar</a>
        </div>
    </div>
</form>

<?php
include_once "../default/footer.php";
?>
