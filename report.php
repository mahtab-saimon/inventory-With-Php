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
                        <h1>Invoice</h1>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-check"></i>	Order Report
                        </div>
                        <!-- /panel-heading -->
                        <div class="panel-body">

                            <form class="form-horizontal" action="getOrderReport.php" method="post" id="getOrderReportForm">
                                <div class="form-group">
                                    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="endDate" class="col-sm-2 control-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /panel-body -->
                    </div>
                </div>
                <!-- /col-dm-12 -->
            </div>

        </div>
        <!-- /row -->

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