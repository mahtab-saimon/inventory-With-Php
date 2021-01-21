<?php
require_once 'pos/connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory | Report</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php
    include_once "inc/header.php";
    ?>
    <!-- /.navbar -->
    <?php
    include_once "inc/sidebar.php";
    ?>
    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container">
            <?php
            if($_POST) {

                $startDate = $_POST['startDate'];
                $date = DateTime::createFromFormat('d/m/Y', $startDate);
                $start_date = $date->format("d/m/Y");


                $endDate = $_POST['endDate'];
                $format = DateTime::createFromFormat('d/m/Y', $endDate);
                $end_date = $format->format("d/m/Y");
//                print_r($start_date);
//                print_r($end_date);
//                die();
                $sql = "select * from orders,customers where orders.customer_Id = customers.id and orderDate >= '$start_date' AND orderDate <= '$end_date'";
                $query = $conn->query($sql);
                ?>
                <table class="table">
                    <thead>
                        <th>Order Date</th>
                        <th>Client Name</th>
                        <th>Contact</th>
                        <th>Grand Total</th>
                    </thead>
                    <tbody>
                    <?php

                    $totalAmount = 0;
                    while ($result = $query->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $result['orderDate'] ?></td>
                            <td><?= $result['firstname'] ?></td>
                            <td><?= $result['phone'] ?></td>
                            <td><?= $result['total'] ?></td>
                        </tr>
                        <?php
                        $totalAmount += $result['total'];
                    }
                    ?>
                    <tr>
                        <td colspan="3">
                            Total Amount
                        </td>
                        <td><?= $totalAmount ?></td>
                    </tr>
                    </tbody>
                </table>
                <?php
            }
            ?>
            <div class="row no-print">
                <div class="col-12">
                    <a href="#" onclick="print();" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
        </div>


    </div>
    <!-- /.content-wrapper -->
    <?php
    include_once "inc/footer.php";
    ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
