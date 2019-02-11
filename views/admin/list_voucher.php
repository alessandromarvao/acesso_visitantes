<?php
include_once "header.php";

use Controller\Classes\VouchersController;
?>

<div class="row">
    <div class="col-md-4">
        <table class="table table-stripped" id="table">
            <!-- <thead>
                <tr>
                    <th>#</th>
                    <th>Voucher</th>
                </tr>
            </thead>
            <tbody>
            </tbody> -->
        </table>
    </div>
</div>


<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table').DataTable({
            serverSide: true,
            ajax: '../../controller/vouchers/list.php',
            paging: true,
            columns:[
                {title: 'id'},
                {title: 'voucher'}
            ]
        });
    } );
</script>
    
</body>
</html>
