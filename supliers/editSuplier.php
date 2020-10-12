<?php
session_start();
include_once "../classes/Suplier.php";

if (!isset($_REQUEST['supId']) || $_REQUEST['supId'] == NULL){

    header("location:allSuplier.php");

}
else{
    $id = $_GET['supId'];
}
?>

<?php
$sup = new Suplier();
if (isset($_POST['submit'])){
    $suplierUpdate = $sup->suplierUpdate($_POST,$_FILES,$id);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory  | edit Suplier</title>
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
                        <h1>edit Suplier</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Suplier</li>
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
                                <h3 class="card-title">Edit Suplier</h3>
                                <h2 class="">
                                </h2>
                            </div>
                            <form action="" method="post"  enctype="multipart/form-data">
                                <div class="card-body">

                                    <?php
                                    $getSuplier = $sup->geSuplierById($id);
                                    if ($getSuplier) {
                                        while ($result = $getSuplier->fetch_assoc()) {

                                            ?>
                                            <div class="form-group">
                                                <label for="firstname">Firstname</label>
                                                <input id="firstname" class="form-control" value="<?= $result['firstname']; ?>" name="firstname" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="lastname">Lastname</label>
                                                <input id="lastname" class="form-control" value="<?= $result['lastname']; ?>" name="lastname" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input id="email" class="form-control" value="<?= $result['email']; ?>" name="email" type="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Phone</label>
                                                <input id="email" class="form-control" value="<?= $result['phone']; ?>" name="phone" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">address</label>
                                                <input id="address" class="form-control" value="<?= $result['address']; ?>" name="address" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="experience">shopName</label>
                                                <input id="experience" class="form-control" value="<?= $result['shopName']; ?>" name="shopName"
                                                       type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="salary">accountHolder</label>
                                                <input id="salary" class="form-control" value="<?= $result['accountHolder']; ?>" name="accountHolder" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="vacation">accountNumber</label>
                                                <input id="vacation" class="form-control" value="<?= $result['accountNumber']; ?>" name="accountNumber" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="vacation">bankName</label>
                                                <input id="vacation" class="form-control" value="<?= $result['bankName']; ?>" name="bankName" type="text">
                                            </div>

                                            <div class="form-group">
                                                <label for="vacation">bankBranch</label>
                                                <input id="vacation" class="form-control" value="<?= $result['bankBranch']; ?>" name="bankBranch" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">city</label>
                                                <input id="city" class="form-control" value="<?= $result['city']; ?>" name="city" type="text">
                                            </div>
                                            <div class="form-group">
                                                <img src="<?= $result['image']; ?>" height="60px" width="60px"alt="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
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
