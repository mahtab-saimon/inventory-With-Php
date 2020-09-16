<?php
include_once "../classes/Expence.php";
include_once "../classes/Employee.php";

$expence = new Expence();
if (isset($_POST['submit'])){
    $expenceAdded = $expence->addExpence($_POST);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory | Add Expence</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
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
                        <h1>Expence Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Expence</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h2>
                                    <?php
                                    if (isset($expenceAdded)){
                                        echo $expenceAdded;
                                    }
                                    ?>
                                </h2>
                                <h3 class="card-title">Advance Salary</h3>
                            </div>
                            <form action="" method="post">

                                <div class="card-body">
                                    <div class="form-group  col-md-6">
                                        <label for="Details">Expence Details</label>
                                        <input id="Details" class="form-control" name="details" type="text">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group  col-md-6">
                                        <label for="amount">Expence Amount</label>
                                        <input id="amount" class="form-control" name="amount" type="text">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group  col-md-6">
                                        <input id="year" class="form-control" name="year" value="<?=date('Y')?>" type="hidden">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group  col-md-6">

                                        <input id="month" class="form-control" name="month" value="<?=date('F')?>" type="hidden">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group  col-md-6">
                                        <input id="date" class="form-control" name="date" value="<?=date("d/m/y")?>" type="hidden">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
</body>
</html>
