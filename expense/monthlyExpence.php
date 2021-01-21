<?php
include_once "../classes/Expence.php";
$expence = new Expence();
?>
<?php
if (isset($_REQUEST['catId'])){
    $id = $_REQUEST['catId'];
    $delCategory = $expence->delCatById($id);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory  | All Category</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php
    include_once "../inc/header.php";
    ?>
    <!-- /.navbar -->
    <?php
    include_once "../inc/sidebar.php";
    ?>
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Expense</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">All Expense</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-outline-dark" href="month/januaryExpence.php">January</a>
                                <a class="btn btn-outline-dark" href="month/FebruaryExpence.php">February</a>
                                <a class="btn btn-outline-dark" href="month/MarchExpense.php">March</a>
                                <a class="btn btn-outline-dark" href="month/AprilExpense.php">April</a>
                                <a class="btn btn-outline-dark" href="month/MayExpense.php">May</a>
                                <a class="btn btn-outline-dark" href="month/JuneExpense.php">June</a>
                                <a class="btn btn-outline-dark" href="month/JulyExpense.php">July</a>
                                <a class="btn btn-outline-dark" href="month/AugustExpense.php">August</a>
                                <a class="btn btn-outline-dark" href="month/SeptemberExpense.php">September</a>
                                <a class="btn btn-outline-dark" href="month/OctoberExpense.php">October</a>
                                <a class="btn btn-outline-dark" href="month/NovemberExpense.php">November</a>
                                <a class="btn btn-outline-dark" href="month/DecemberExpense.php">December</a>
                            </div>
                            <div class="card-header">
                                <h1 class="text-center"><?=date("F")?> <span class="break"></span> All Expense</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $getexpence = $expence->getMonthlyExpence();
                                    if ($getexpence){
                                        $i=0;
                                        $totalAmount=0;
                                        while ($result = $getexpence->fetch_assoc()) {
                                            $i++;

                                            ?>
                                            <tr class="">
                                                <td><?= $i?></td>
                                                <td><?= $result['details']; ?></td>
                                                <td><?= $result['date']; ?></td>
                                                <td><?= $result['amount']; ?></td>
                                            </tr>

                                            <?php
                                            $totalAmount += $result['amount'];
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            <h1 class="text-center">Total Expanse: <?=$totalAmount?> </h1>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="#" onclick="print();" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include_once "../inc/footer.php";
    ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>
</html>
