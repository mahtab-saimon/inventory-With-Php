<?php
include_once "../lib/Session.php";
Session::checkSession();
include_once "../classes/Color.php";
$col = new Color();


if (!isset($_REQUEST['clId']) || $_REQUEST['clId'] == NULL){

    header("location:allColor.php");

}
else{
    $id = $_GET['clId'];
}
?>

<?php
if (isset($_POST['submit'])){
    $color=$_POST['color'];
    $colorUpdate = $col->colorUpdate($color, $id);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory  | edit Brand</title>
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
                        <h1>edit Brand</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Brand</li>
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
                                <h3 class="card-title">Edit Brand</h3>
                                <h2 class="">
                                    <?php
                                    if (isset($colorUpdate)){
                                        echo $colorUpdate;
                                    }
                                    ?>
                                </h2>
                            </div>
                            <form action="" method="post"  enctype="multipart/form-data">
                                <div class="card-body">

                                    <?php
                                    $getCat= $col->getColorById($id);
                                    if ($getCat) {
                                        while ($result = $getCat->fetch_assoc()) {

                                            ?>

                                            <div class="form-group">
                                                <label for="brandName">Color</label>
                                                <input id="brandName" class="form-control" value="<?= $result['color']; ?>" name="color" type="text">
                                            </div>

                                            <?php
                                        }
                                    }
                                    ?>
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
