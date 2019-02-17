<?php
include_once "header.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <h3>Logs do Sistema</h3>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-8">
            <table class="table table-stripped" id="table"></table>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-2">
            <a href="/views/admin/index.php" class="btn btn-lg btn-warning" >Voltar</a>
        </div>
    </div>
</div>


<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table').DataTable({
            ajax: '../../controller/logs/list.php',
            paging: true,
            columns:[
                {data: 'id', title: '#'},
                {data: 'data', title: 'Data'},
                {data: 'matricula_usuarios', title: 'Matrícula'},
                {data: 'p_nome', title: 'Nome'},
                {data: 'msg', title: 'Mensagem'}
            ]
        });
    } );
</script>
    
</body>
</html>
