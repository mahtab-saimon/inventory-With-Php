<?php
session_start();
include_once "../classes/Suplier.php";

$cmr = new Suplier();
if (isset($_POST['submit'])){
    $suplierInserted = $cmr->suplierInsert($_POST,$_FILES);
}
?>



        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory | Add Customers</title>

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
                        <h1>Suplier Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="allSuplier.php" class="btn btn-outline-info ">All Suplier</a>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Suplier</li>
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
                                <h3 class="card-title">Add Suplier</h3>
                            </div>
                            <form action="" method="post"  enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="firstname">Name</label>
                                            <input id="firstname" class="form-control" name="firstname" type="text">
                                        </div>
                                        <div class="col form-group">
                                            <label for="email">Email</label>
                                            <input id="email" class="form-control" name="email" type="email">
                                        </div>
                                        <div class="col form-group">
                                            <label for="email">Phone</label>
                                            <input id="email" class="form-control" name="phone" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="address">address</label>
                                            <input id="address" class="form-control" name="address" type="text">
                                        </div>
                                        <div class="col form-group">
                                            <label for="accountNumber">Account Number</label>
                                            <input id="accountNumber" class="form-control" name="accountNumber" type="text">
                                        </div>
                                        <div class="col form-group">
                                            <label for="bankName">BankName</label>
                                            <input id="bankName" class="form-control" name="bankName" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"  name="image" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
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
<?php
include_once "../inc/tostr.php";
?>
</body>
</html>
