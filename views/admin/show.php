<?php
include_once "header.php";

use Model\Usuarios;
?>

<div class="container-fluid">
    <h3>Usuários:</h3>
    <div class="row">
        <div class="col-md-4">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Privilégio</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $usuarios = Usuarios::read();
                foreach($usuarios as $row){
                    echo "<tr>";
                    echo "<td>";
                        echo $row['matricula'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['p_nome'];
                    echo "</td>";
                    echo "<td>";
                        if($row['privilegio']==1){
                            echo "Administrador";
                        } else {
                            echo "Recepcionista";
                        }
                        echo "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="col-md-2"><a href="/views/admin/index.php"class="btn btn-lg btn-warning" >Voltar</a></div>
        </div>
    </div>
</div>

<?php
include_once "../default/footer.php";
?>