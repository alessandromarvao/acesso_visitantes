<?php
include_once "header.php";

?>

<div class="container-fluid">
    <h3>Adicionar usuário</h3>
    <hr>
    <form action="../../controller/usuarios/create.php" method="post">
        <div class="form-group">
            <div class="col-md-4">
                <label for="inputUser">Matricula ou CPF:</label>
                <input type="text" name="user" id="inputUser" class="form-control" required autocomplete="off">
                <br>
                <label for="selectAccess">Nível de acesso:</label>
                <select name="access" id="selectAccess" class="form-control">
                    <option value="1">Administrador</option>
                    <option value="2" selected >Recepcionista</option>
                </select>
                <br>
                <label for="p_nome">Primeiro nome:</label>
                <input type="text" name="p_nome" class="form-control" id="p_nome">
                <br>
                <label for="u_nome">Sobrenome:</label>
                <input type="text" name="u_nome" class="form-control" id="u_nome">
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-lg btn-success">Enviar</button>
                    </div>
                    <div class="col-md-offset-10">
                        <a href="/views/admin/index.php" class="btn btn-lg btn-warning" >Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include_once "../default/footer.php";
?>