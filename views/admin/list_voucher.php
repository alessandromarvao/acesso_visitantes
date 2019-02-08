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
            <?php
            // $vouchers = VouchersController::read();
            // foreach($vouchers as $row){
            //     echo "<tr>";
            //         echo "<td>";
            //             echo $row['id'];
            //         echo "</td>";
            //         echo "<td>";
            //             echo $row['voucher'];
            //         echo "</td>";
            //     echo "</tr>";
            // }
            ?>
            </tbody> -->
        </table>
    </div>
</div>


<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#Table').DataTable({
            serverSide: true,
            ajax: '',
            paging: true,
            columns:[
                {title: '#'},
                {title: 'Voucher'}
            ]
        });
    } );
</script>
    
</body>
</html>
